<?php
include('connect.php');


session_start();

if (isset($_GET['section'])){
    $section = htmlspecialchars($_GET['section']);


}
else {
    $section = "";
}
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
if (isset($_POST["reset"])) {
    $recup_mail = htmlspecialchars($_POST['email']);
    $mailexist = $db->prepare('SELECT idClient,firstName FROM client WHERE email = ?');
    $mailexist->execute(array($recup_mail));
    $mailexist_count = $mailexist->rowCount();
    if ($mailexist_count == 1) {
        $firstName = $mailexist->fetch();
        $firstName = $firstName['firstName'];

        $_SESSION['email'] = $recup_mail;
        $recup_code = "";
        for ($i = 0; $i < 8; $i++) {
            $recup_code .= mt_rand(0, 9);
        }
        $mail_recup_exist = $db->prepare('SELECT id FROM recuperation  WHERE email = ?');
        $mail_recup_exist->execute(array($recup_mail));
        $mail_recup_exist = $mail_recup_exist->rowCount();
        if ($mail_recup_exist == 1) {
            $recup_insert = $db->prepare('UPDATE recuperation  SET code = ? WHERE email = ?');
            $recup_insert->execute(array($recup_code, $recup_mail));
        } else {
            $recup_insert = $db->prepare('INSERT INTO recuperation (email,code) VALUES (?, ?)');
            $recup_insert->execute(array($recup_mail, $recup_code));
        }
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ines.jelassi@esprit.tn';
        $mail->Password = '211JFT5974';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('ESPREAT@support.com');
        $mail->addAddress($_POST["email"]);
        $mail->isHTML(true);
        $mail->Subject = 'Recuperation de mot de passe - FITHNYTI';
        $mail->Body = '<html>
    <head>
     <title>Recuperation de mot de passe - Votresite</title>
     <meta charset="utf-8" />
    </head>
    <body>
     <font color="#303030";>
       <div align="center">
          <table width="600px">
           <tr>
             <td>
                
                <div align="center">Bonjour <b>' .$firstName. '</b>,</div>
                Voici votre code de récupération: <b>' .$recup_code. '</b>
                A bientôt sur <a href="http://localhost:3000/FYTHNYTI/View/Front/index.php">FITHYTI</a> !
                
             </td>
           </tr>
           <tr>
            <td align="center">
                <font size="2">
                 Ceci est un email automatique, merci de ne pas y répondre
                </font>
             </td>
           </tr>
          </table>
       </div>
     </font>
    </body>
    </html>
    ';
        ;
        $mail->send();
        header("Location: http://localhost:3000/view/Front/send.php?section=code");

}
else {
    $error = "Cette adresse mail n'est pas enregistrée";
 }
}
if (isset($_POST['verif_submit'], $_POST['verif_code'])) {
    if (!empty($_POST['verif_code'])) {
        $verif_code = htmlspecialchars($_POST['verif_code']);
        $verif_req = $db->prepare('SELECT id FROM recuperation  WHERE email = ? AND code = ?');
        $verif_req->execute(array($_SESSION['email'], $verif_code));
        $verif_req = $verif_req->rowCount();

        if ($verif_req == 1) {
            $up_req = $db->prepare('UPDATE recuperation  SET confirme = 1 WHERE email = ?');
            $up_req->execute(array($_SESSION['email']));

            header('Location: http://localhost:3000/view/Front/send.php?section=changemdp');
            exit;
        } else {
            $error = "Code invalid";
            header("Location: http://localhost:3000/view/Front/send.php?section=code&error=" . urlencode($error));
            exit;
        }
    }
}
if (isset($_POST['change_submit'])) {
    if (isset($_POST['change_mdp'], $_POST['change_mdpc'])) {
        $verif_confirme = $db->prepare('SELECT confirme FROM recuperation WHERE email = ?');
        $verif_confirme->execute(array($_SESSION['email']));
        $verif_confirme = $verif_confirme->fetch();
        $verif_confirme = $verif_confirme['confirme'];
        if ($verif_confirme == 1) {
            $mdp = htmlspecialchars($_POST['change_mdp']);
            $mdpc = htmlspecialchars($_POST['change_mdpc']);

            if (!empty($mdp) && !empty($mdpc)) {
                if ($mdp == $mdpc) {
                    $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);
                    $ins_mdp = $db->prepare('UPDATE client SET password = ? WHERE email = ?');
                    if ($ins_mdp->execute(array($hashedPassword, $_SESSION['email']))) {
                        $del_req = $db->prepare('DELETE FROM recuperation WHERE email = ?');
                        $del_req->execute(array($_SESSION['email']));

                        header('Location: http://localhost:3000/view/Front/login.php');
                        exit;
                    } else {
                        $error = "Erreur lors de la mise à jour du mot de passe dans la base de données";
                    }
                } else {
                    $error = "Vos mots de passes ne correspondent pas";
                }
            } else {
                $error = "Veuillez remplir tous les champs";
            }
        } else {
            $error = "Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail";
        }
    } else {
        $error = "Veuillez remplir tous les champs";
    }
}
 
?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Reset Password</title>
    <link rel="stylesheet" href="css\login.css"/>
</head>
<body>
<h3>Reset Password</h3>
<form action="send.php" method="post">
    <?php if ($section == 'code') { ?>
        <p>Un code de vérification a été envoyé à <?= $_SESSION['email'] ?></p>

        <?php
        if (isset($_GET['error'])) {
            $error = urldecode($_GET['error']);
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        }
        ?>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Code de vérification"
                   name="verif_code" required>
            <label for="floatingInput">Votre Code</label>
        </div>

        <div class="d-flex align-items-center justify-content-between mb-4"></div>

        <button type="submit" name="verif_submit" class="btn btn-primary py-3 w-100 mb-4">Valider</button>
        <?php } elseif ($section == 'changemdp') { ?>
    <p>Nouveau mot de passe pour <?= $_SESSION['email'] ?></p>

    <?php
    if (isset($error)) {
        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
    }
    ?>

    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="newPassword" placeholder="Nouveau mot de passe"
               name="change_mdp" required>
        <label for="newPassword">Nouveau mot de passe</label>
    </div>

    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="confirmPassword"
               placeholder="Confirmation du mot de passe" name="change_mdpc" required>
        <label for="confirmPassword">Confirmation du mot de passe</label>
    </div>

    <div class="d-flex align-items-center justify-content-between mb-4"></div>

    <button type="submit" name="change_submit" class="btn btn-primary py-3 w-100 mb-4">Valider</button>
    <?php } else { ?>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@esprit.tn" name="email"
                   required>
            <label for="floatingInput">Email address</label>
        </div>

        <div class="d-flex align-items-center justify-content-between mb-4"></div>

        <button type="submit" name="reset" class="btn btn-primary py-3 w-100 mb-4">Send Link</button>

        <?php if (isset($error)) {
            echo '<span style="color:red">' . $error . '</span>';
        } else {
            echo "";
        } ?>
    <?php } ?>
</form>
</body>
</html>

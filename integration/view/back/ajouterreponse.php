<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/integration/config.php";
require_once  $_SERVER['DOCUMENT_ROOT'] . "/integration/model/Reponseadmin.php";
require_once  $_SERVER['DOCUMENT_ROOT'] . "/integration/controller/ReponseAdminc.php";
require_once  $_SERVER['DOCUMENT_ROOT'] . "/integration/controller/Reclamationc.php";
require_once  $_SERVER['DOCUMENT_ROOT'] . "/integration/send/PHPMailerAutoload.php";
session_start();
if(isset($_GET['id']))
{
    $id=$_GET['id'];
}
if (isset($_POST["submit"])) {
    if (
        ($_POST['titre'] != "") &&
        ($_POST['description'] != "") &&
        ($_POST['image'] != "") &&
        ($_POST['dateReponse'] != "") &&
        ($_POST['idrec'] != "")
    ) {
        $reponse = new ReponseAdmin(
            $_POST['titre'],
            $_POST['description'],
            $_POST['image'],
            $_POST['dateReponse'],
            $_POST['idrec']
        );

        $reponseAdminc = new ReponseAdminc();
        $reponseAdminc->ajoutereponse($reponse);
        $rec= new Reclamationc();
        $reclamtion=$rec->getreclamation($_POST['idrec']);
        echo "<script>alert(\"Réponse ajoutée avec succès\")</script>";
        try {

            $mail = new PHPMailer;
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();
            // Send using SMTP
            $mail->Host = 'smtp.gmail.com';
            // $mail->SMTPDebug = 2;                      // Set the SMTP server to send through
            $mail->SMTPAuth = true;
            // Enable SMTP authentication
            $mail->Username = "firas.chkoundali@esprit.tn";                     // SMTP username
            $mail->Password = "";                               // SMTP password
            $mail->SMTPSecure = 'tls';        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 587;
            $mail->addAddress($reclamtion['email']);               // Name is optional


            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Notification';
            $mail->Body = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse à votre réclamation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
        }

        strong {
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Réponse à votre réclamation</h1>
        <p>Ladministrateur a répondu à votre réclamation</p>
    </div>
</body>
</html>
            ';
            if($mail->send())
                echo 'Message has been sent';
            } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    header("Location: afficherreclamations.php");
    } else {
        echo "<script>alert(\"Veuillez remplir tous les champs\")</script>";
        $id=$_POST['idrec'];
    }
}
?>



<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Now UI Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
<div class="wrapper ">
<?php include 'navigatiintegration
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="#pablo">Table List</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <form>
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Search...">
                            <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </span>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#pablo">
                                <i class="now-ui-icons media-2_sound-wave"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Stats</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="now-ui-icons location_world"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Some Actions</span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pablo">
                                <i class="now-ui-icons users_single-02"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Account</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="panel-header panel-header-sm">
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header">
                            <h4 class="card-title">Ajouter une Réponse</h4>
                        </div>
                        <div class="card-body">
                            <form action="ajouterreponse.php" method="post">
                                <div class="container-fluid">
                                    <div class="text-center">
                                        <div class="form-group">
                                            <div class="form-row">
                                                <label class="col-md-5" for="titre">Titre de la Réponse:</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="titre" >
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-row">
                                                <label class="col-md-5" for="description">Description:</label>
                                                <div class="col-md-4">
                                                    <textarea name="description" class="form-control" rows="4" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div >
                                                <div class="form-row">
                                                    <label class="col-md-5" >image :  </label>
                                                    <div class="col-md-4">
                                                        <input type="file"  name="image"  ></input>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <label class="col-md-5" for="dateReponse">Date de la Réponse:</label>
                                                <div class="col-md-4">
                                                    <input readonly type="text" class="form-control" name="dateReponse" value=" <?php   echo  date("Y-m-d")    ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <label class="col-md-5" for="idrec">ID de la reclamation associé:</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control"  value="<?php echo $id ?>" name="idrec" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <label class="col-md-5"></label>
                                                <div class="col-md-4">
                                                    <button class="btn btn-primary" name="submit">Ajouter Réponse</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">

            <div class="copyright">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, Designed by
                <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
                <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
            </div>
        </div>
    </footer>
</div>
</div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="../assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-dashboard.js?v=1.0.1"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>

</html>




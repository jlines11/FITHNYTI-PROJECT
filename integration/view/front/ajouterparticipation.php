<?php
require_once '../../controller/participationc.php';
require_once '../../controller/evenementc.php';
require  $_SERVER['DOCUMENT_ROOT'] . "/integration/send/PHPMailerAutoload.php";

$evenetc=new Evenementc();
$listesevenement=$evenetc->afficherevenement();
$id=$_GET["event"];
$participationc=new Participationc();
$participation=new Participation(
    $id,$_SESSION["idClient"]
);
$user=$participationc->getuser($_SESSION["idClient"]);
$test=$participationc->verif($id,$_SESSION["idClient"]);
if($test==null)
{
    $part=$participationc->ajouterparticipation($participation);
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
        $mail->addAddress($user['email']);               // Name is optional


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
        <h1>Notification : Confirmation de participation à l"événement </h1>
        <p>
        
        Nous vous remercions de votre participation à l"événement.
        Votre présence est grandement appréciée.
    Cordialement,
</p>
    </div>
</body>
</html>
            ';
        if($mail->send())
            echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    header("Location: ../view/affichierevenementfront.php");

}
else
{
    echo "<script>alert(\"tu as participé déja à cette evenement\")</script>";

}

?>

<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <title>Elaxi</title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Dosis:500|Poppins:400,600,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
<div class="hero_area">
     <!-- header section strats -->
     <?php include 'navigation.php'; ?>
    <!-- end header section -->
</div>

<!-- why section -->


<section class="why_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Évènements
            </h2>
        </div>
        <!-- Add the Bootstrap CDN link here if not already included -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Add the Font Awesome CDN link here if not already included -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
              integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Ji5iS6JFq5tNUU5l90ieBqF5wE"
              crossorigin="anonymous">

        <style>
            /* Add any additional custom styles here */
            .box {
                border: 1px solid #ddd;
                margin-bottom: 20px;
                padding: 15px;
                text-align: center;
            }

            .img-box img {
                max-width: 100%;
                height: auto;
            }

            .event-title {
                margin-top: 10px;
            }

            .event-description {
                color: #555;
            }

            .event-info-list {
                list-style: none;
                padding: 0;
                margin-top: 15px;
            }

            .event-info-list li {
                margin-bottom: 8px;
            }

            .event-info-list i {
                margin-right: 5px;
            }
        </style>

        <div class="why_container">
            <div class="row">
                <?php foreach ($listesevenement as $event) { ?>
                    <div class="col-md-4">
                        <div class="box b1">
                            <div class="img-box">
                                <img src="images/<?= $event['image'] ?>" alt="<?= $event['titre'] ?>" class="img-fluid" />
                            </div>
                            <div class="detail-box">
                                <h5 class="event-title" style="color: white">
                                    Titre: <?= $event['titre']; ?>
                                </h5>
                                <p class="event-description" style="color: white">
                                    Description: <?= $event['description']; ?>
                                </p>
                                <ul class="event-info-list">
                                    <li><i class="fa fa-home fa-fw"></i> Type: <?= $event['type']; ?></li>
                                    <li><i class="fa fa-solid fa-map"></i> Lieu: <?= $event['lieu']; ?></li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> Date: <?= $event['date']; ?></li>
                                    <li><i class="fa fa-users fa-fw"></i> Participants: <?= $event['nbparticipant']; ?>
                                    <li><a href="ajouterparticipation.php?event=<?php echo $event['idevent'] ;?>"><i class="fa fa-calendar-check"></i>Paticiper</a></li>
                                    <i class="fa fa-facebook"></i>
                                    <a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u=<?= urlencode("affichierevenementfront.php"); ?>"
                                       rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;">
                                        <img src="chemin_vers_votre_image_facebook.png" alt="Partager sur Facebook" />
                                    </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-twitter"></i>
                                        <a href="https://twitter.com/intent/tweet?url=<?=  "titre De l'eveneement : ".$event['titre']."Desctiption : ".$event['description']."lieu : ".$event['lieu']; ?>" target="_blank">Partager sur Twitter</a>
                                    </li>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!-- Add the Bootstrap and Font Awesome CDN scripts here if not already included -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>

</section>

<!-- end why section -->

<!-- info section -->
<section class="info_section ">

    <div class="container">
        <div class="info_top ">
            <div class="row ">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="info_detail">
                        <a href="index.html">
                            <h4>
                                Elaxi
                            </h4>
                        </a>
                        <p>
                            Soluta odit exercitationem rerum aperiam eos consectetur impedit delectus qui reiciendis, distinctio, asperiores fuga labore a? Magni natus.
                        </p>
                        <div class="social_box">
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                    <h4>
                        Contact us
                    </h4>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit
                    </p>
                    <div class="contact_nav">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                  Location
                </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                  Call : +01 123455678990
                </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                  Email : demo@gmail.com
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info_form">
                        <h4>
                            SIGN UP TO OUR NEWSLETTER
                        </h4>
                        <form action="">
                            <input type="text" placeholder="Enter Your Email" />
                            <button type="submit">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end info_section -->


<!-- footer section -->
<footer class="footer_section">
    <div class="container">
        <p>
            &copy; <span id="displayYear"></span> All Rights Reserved By
            <a href="https://html.design/">Free Html Templates</a>
        </p>
    </div>
</footer>
<!-- footer section -->


<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/custom.js"></script>

</body>

</html>


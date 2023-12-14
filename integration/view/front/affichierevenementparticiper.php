<?php
require_once '../../controller/evenementc.php';
require_once '../../controller/participationc.php';

$evenetc=new Evenementc();
$participation=new Participationc();
$listesevenement=$participation->afficherparticipation($_SESSION["idClient"]);

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
<header class="header_section ">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.php">
            <span>
              Fithnyti
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
          </button>
          <div class="collapse navbar-collapse ml-auto  " id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item ">
                <a class="nav-link" href="index.php">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="affichierevenementfront.php">Evenements </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="affichierevenementparticiper.php">Participations </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="affichierreclamation.php">Reclamations </a>
              </li>
              
              <li class="nav-item">   
                <a class="nav-link" href="calendrier.php">Calendrier</a>
              </li>
              <li class="nav-item">   
                <a class="nav-link" href="listedemande.php">Demandes</a>
              </li>
              <li class="nav-item">   
                <a class="nav-link" href="listeliv.php">Livraison</a>
              </li>
              <li class="nav-item">   
                <a class="nav-link" href="ajouterlivraison2.php">Ajouter Livraison</a>
              </li>
              
            </ul>
            <?php session_start();if (empty($_SESSION)) {?>

              <div class="user_option ">
              <a href="login.php" class="">
                Login / signUp
              </a>
            </div>

            <?php } else {?>
      
              <div class="user_option ">
              <a href="logout.php" class="">
              <?php echo $_SESSION['email']; ?>
              
              </a>
              
              
            </div>
            <?php }?>
           


          </div>
        </nav>
      </div>
    </header>
</div>

<!-- why section -->


<section class="why_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
              Mes Évènements
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
                                    <li><a href="supprimerparticipation.php?supprimer=<?php echo $event['idevent'] ;?>"><i class="fa fa-calendar-check"></i>Annuler</a></li>
                                    <i class="fa fa-facebook"></i>
                                    <a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u=<?= urlencode("affichierevenementfront.php"); ?>"
                                       rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;">
                                        <img src="chemin_vers_votre_image_facebook.png" alt="Partager sur Facebook" />
                                    </a>                                    </li>
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


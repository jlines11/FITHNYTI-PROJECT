<?php
require_once '../../controller/Reclamationc.php';

$reclamationc = new Reclamationc();
$listereclamations = $reclamationc->affichereclamations();
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
                Réclamations
            </h2>
            <a href="ajouterreclamation.php" class="btn btn-primary">Ajouter Réclamation</a>

        </div>

        <div class="why_container">
            <div class="row">
                <?php foreach ($listereclamations as $reclamation) { ?>
                    <div class="col-md-4">
                        <div class="box b1">
                            <div class="detail-box">
                                <h5 class="event-title" style="color: white">
                                    Titre: <?= $reclamation['titre']; ?>
                                </h5>
                                <p class="event-description" style="color: white">
                                    Description: <?= $reclamation['description']; ?>
                                </p>
                                <ul class="event-info-list">
                                    <li><i class="fa fa-user fa-fw"></i> Nom du conducteur: <?= $reclamation['nomconducteur']; ?></li>
                                    <li><i class="fa fa-envelope fa-fw"></i> E-mail: <?= $reclamation['email']; ?></li>
                                    <li><i class="fa fa-phone fa-fw"></i> Numéro de téléphone: <?= $reclamation['numtel']; ?></li>
                                    <li><i class="fa fa-tag fa-fw"></i> Type: <?= $reclamation['type']; ?></li>
                                </ul>
                            </div>
                            <!-- Ajoutez ici un bouton pour afficher les détails dans un modal -->
                            <button class="btn btn-dark" data-toggle="modal" data-target="#reclamationModal<?= $reclamation['idrec']; ?>">Details</button>
                            <a class="btn btn-info" href="modifierreclamation.php?modifier=<?= $reclamation['idrec']; ?>" >Modifier</a>

                            <a class="btn btn-warning" href="supprimerreclamation.php?id=<?= $reclamation['idrec']; ?>" >Supprimer</a>
                            <a href="affichierreponse.php?id=<?= $reclamation['idrec']; ?>">Afficher Reponse</a>
                        </div>
                    </div>

                    <!-- Ajoutez ici le modal pour afficher les détails de la réclamation -->
                    <div class="modal fade" id="reclamationModal<?= $reclamation['idrec']; ?>" tabindex="-1" role="dialog" aria-labelledby="reclamationModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reclamationModalLabel"><?= $reclamation['titre']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Description: <?= $reclamation['description']; ?></p>
                                    <p>Nom du conducteur: <?= $reclamation['nomconducteur']; ?></p>
                                    <p>E-mail: <?= $reclamation['email']; ?></p>
                                    <p>Numéro de téléphone: <?= $reclamation['numtel']; ?></p>
                                    <p>Type: <?= $reclamation['type']; ?></p>
                                    <img src="images/<?= $reclamation['image']; ?>"width = "50" height = "50" >                                                        <!-- Ajoutez ici d'autres détails de la réclamation selon vos attributs -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <!-- Ajoutez ici d'autres actions pour le modal si nécessaire -->
                                </div>
                            </div>
                        </div>                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
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

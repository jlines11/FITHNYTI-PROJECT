<?php
require_once "../../model/Reclamation.php";
require_once "../../controller/Reclamationc.php";

if (isset($_GET["modifier"])) {
    $id = $_GET["modifier"];
    $reclamationc = new Reclamationc();
    $reclamation = $reclamationc->getReclamation($id);
} else {
    if (isset($_POST["submit"])) {
        $var = isset($_POST['idreclamation']) ? (int)$_POST['idreclamation'] : null;

        if (
            !empty($_POST['titre']) &&
            !empty($_POST['description']) &&
            !empty($_POST['nomconducteur']) &&
            !empty($_POST['email']) &&
            filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && // Validate email format
            !empty($_POST['numtel']) &&
            preg_match('/^[0-9]{8}$/', $_POST['numtel']) && // Validate 8-digit phone number
            !empty($_POST['type']) &&
            !empty($_POST['actions']) &&
            !empty($_POST['image']) &&
            $var !== null
        ) {
            $reclamationn = new Reclamation(
                $_POST['titre'],
                $_POST['description'],
                $_POST['nomconducteur'],
                $_POST['email'],
                $_POST['numtel'],
                $_POST['type'],
                $_POST['actions'],
                $_POST['image']
            );

            $reclamationc = new Reclamationc();
            $reclamationc->modifierReclamation($reclamationn, $var);

            header("Location: affichierreclamation.php");
            // exit();
        } else {
            echo "<script>alert(\"Il faut remplir tous les champs correctement\")</script>";
            $var = isset($_POST['idreclamation']) ? (int)$_POST['idreclamation'] : null;
            $reclamationc = new Reclamationc();
            $reclamation = $reclamationc->getReclamation($var);
        }
    }
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
<section class="why_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2 style="color: #333; font-size: 2em; margin-bottom: 20px;">
                Modifier Reclamation
            </h2>
            <form method="POST" action="modifierreclamation.php" style="max-width: 600px; margin: 0 auto; padding: 20px; background: #f8f9fa; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <label for="titre" style="display: block; margin-bottom: 10px; font-size: 1.2em;">Identifiant du Reclamation :</label>
                <input readonly  type="text" value="<?php echo $reclamation['idrec']; ?>" name="idreclamation" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
                <label for="titre" style="display: block; margin-bottom: 10px; font-size: 1.2em;">Titre :</label>
                <input type="text" value="<?php echo $reclamation['titre']; ?>" name="titre" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

                <label for="description" style="display: block; margin-bottom: 10px; font-size: 1.2em;">Description :</label>
                <textarea name="description"  style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;"><?php echo $reclamation['description']; ?></textarea>

                <label for="nomconducteur" style="display: block; margin-bottom: 10px; font-size: 1.2em;">Nom du Conducteur :</label>
                <input type="text" value="<?php echo $reclamation['nomconducteur']; ?>" name="nomconducteur" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

                <label for="email" style="display: block; margin-bottom: 10px; font-size: 1.2em;">E-mail :</label>
                <input type="text" value="<?php echo $reclamation['email']; ?>"  name="email" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

                <label for="numtel" style="display: block; margin-bottom: 10px; font-size: 1.2em;">Numéro de Téléphone :</label>
                <input type="tel" value="<?php echo $reclamation['numtel']; ?>" name="numtel" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

                <label for="type" style="display: block; margin-bottom: 10px; font-size: 1.2em;">Type :</label>
                <input type="text" value="<?php echo $reclamation['type']; ?>" name="type" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

                <label for="actions" style="display: block; margin-bottom: 10px; font-size: 1.2em;">Actions :</label>
                <input type="text" value="<?php echo $reclamation['Actions']; ?>" name="actions" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

                <label for="image" style="display: block; margin-bottom: 10px; font-size: 1.2em;">Image :</label>
                <img src="images/<?php echo $reclamation['image']; ?>">
                <input type="file"   name="image" style="margin-bottom: 15px;">

                <button type="submit" name="submit" style="background: #007bff; color: #fff; padding: 12px 20px; font-size: 1.2em; border: none; border-radius: 5px; cursor: pointer;">Modifier Réclamation</button>
            </form>
        </div>
    </div>
</section>

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

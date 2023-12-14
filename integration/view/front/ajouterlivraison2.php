
<?php

include '../../Controller/livraisonC2.php';

$error = "";

// create livraison
$livraison = null;

// create an instance of the controller
$g_livraison = new traitement_livraison();
if ( isset($_POST["etat"]) && isset($_POST["address_depart"])&& isset($_POST["address_arrive"])  && isset($_POST["tel"])  &&  isset($_POST["date"]) ) {
    if (!empty($_POST["etat"]) &&!empty($_POST["address_depart"])   &&!empty($_POST["address_arrive"])   &&!empty($_POST["tel"])    &&!empty($_POST["date"]) ) 
    {
        $livraison = new livraison(  null, $_POST['etat'], $_POST['address_depart'] , $_POST['address_arrive'] , $_POST['tel'], new DateTime($_POST['date']) );
        $g_livraison->add_livraison($livraison);
        header('Location:index.php');
       // header('Location:ListClients.php');
    } else
        $error = "Missing information";
}
$livraisonC2 = new traitement_livraison();
$list = $livraisonC2->listeslivraison();
$demandeC = new DemandeC();
if(isset($_POST['demande'])){

  $demande= new demande( null,
  $_POST['demandeDate'],
  'Disponible',
  $_POST['id'],
  2);
  $demandeC->add_demande($demande);
  header('Location:listedemande.php');
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

  <title>Fithnyti</title>

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

<body>
  <div class="hero_area">
    <!-- header section strats -->
   <?php include 'navigation.php'; ?>
    <!-- end header section -->


    <!-- slider section -->
   
  </div>

  <!-- book section -->

  <section class="book_section ">
    <div class="container">
      <div class="col-md-11 col=lg-9 mx-auto px-0">
        <div class="book_form ">
        <form action="" method="POST" onsubmit="return validateForm()" >
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="input-group ">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-car" aria-hidden="true"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control" id="Nom et prénom" maxlength="20" placeholder="Entrer Votre nom et prenom">
                </div>
              </div>
              <div class="form-group col-md-6">
                <div class="input-group ">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                  </div>
                  <input type="text" name="tel" id="tel" class="form-control" placeholder="Phone Number">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="input-group ">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                  </div>
                  <input type="text" name="address_depart" id="address_depart" class="form-control" placeholder="Pickup Location ">
                </div>
              </div>
              <div class="form-group col-md-6">
                <div class="input-group ">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                  </div>
                  <input type="text" name="address_arrive" id="address_arrive" class="form-control" placeholder="Drop Location">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="input-group ">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control" name="etat" id="etat" placeholder="Statut Package">
                </div>
              </div>
              <div class="form-group col-md-6">
                <div class="input-group ">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                  </div>
                  <input type="date" name="date" id="date" class="form-control" placeholder="Drop off date">

                </div>
              </div>
            </div>
            <div class="btn-box">
              <button type="submit" class="">Add Now</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


  <!-- end book section -->


  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
              It is a long established fact that a reader will be distracted by
              the readable content of a page when looking at its layout. The point
              of using Lorem Ipsum is that it has a more-or-less normal
              distribution of letters
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- why section -->

  <section class="why_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Why Choose Us
        </h2>
      </div>
      <div class="why_container">
        <div class="row">
          <div class="col-md-4">
            <div class="box b1">
              <div class="img-box">
                <img src="images/w1.png" alt="" class="" />
              </div>
              <div class="detail-box">
                <h5>
                  Fast & Easy Booking
                </h5>
                <p>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its It is a
                  long established fact that a reader
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box b2">
              <div class="img-box">
                <img src="images/w2.png" alt="" class="" />
              </div>
              <div class="detail-box">
                <h5>
                  Driving safety
                </h5>
                <p>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its It is a
                  long established fact that a reader
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box b3">
              <div class="img-box">
                <img src="images/w3.png" alt="" class="" />
              </div>
              <div class="detail-box">
                <h5>
                  Full Satisfaction
                </h5>
                <p>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its It is a
                  long established fact that a reader
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end why section -->

  <!-- app section -->

  <section class="app_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Download Our App
              </h2>
            </div>
            <p>
              It is a long established fact that a reader will be distracted by
              the readable content of a page when looking at its layout. The point
              of using Lorem Ipsum is that it has a more-or-less normal
              distribution of letters
            </p>
            <div class="btn-box">
              <a href="">
                <img src="images/app_store.png" alt="">
              </a>
              <a href="">
                <img src="images/google_play.png" alt="">
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/app-img.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end app section -->

  <!-- blog section -->

  <section class="blog_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Latest From Package
        </h2>
      </div>
      <div class="form-row">
      <div class="row">
      <?php
        foreach ($list as $livraison) {
        ?>
        <form action="" method="POST">
        <div class="col-md-6">
          <div class="box">
            <div class="img-box">
              <img src="frontt/images/b1.jpg" alt="">
            </div>
            <div class="detail-box">
              <h6 class="blog_date">
              <?= $livraison['date'] ?>
              </h6>
              <h5>
              "<?= $livraison['adresse_du_depart'] ?>" VERS "<?= $livraison['adresse_du_arrive']?>"
              </h5>
              <p>
              <?= $livraison['etat_livraison'] ?>
              </p>
              
              <div class="btn-box">
              <button type="submit" id="demande" name="demande" class="">Passer une demande</button>
            </div>
            <input type="hidden" name="id" value="<?php echo $livraison['idliv']; ?>">
            <input type="hidden" name="demandeDate" value="<?php date('Y/m/d'); ?>">
            </div>
          </div>
        </div>
        </form>
        <?php
        }
        ?>
      </div>
      </div>
    </div>
  </section>

  <!-- end blog section -->

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          What Says Our Customers
        </h2>
      </div>
    </div>
    <div class="container">
      <div class="col-md-9 mx-auto px-0">
        <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExample2Controls" data-slide-to="0" class="active">
              <img src="images/c1.jpg" alt="">
            </li>
            <li data-target="#carouselExample2Controls" data-slide-to="1">
              <img src="images/c2.jpg" alt="">
            </li>
            <li data-target="#carouselExample2Controls" data-slide-to="2">
              <img src="images/c3.jpg" alt="">
            </li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="detail-box">
                <h5>
                  Jane Addams
                </h5>
                <h6>
                  Officia dolom
                </h6>
                <p>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                  Atque itaque deserunt beatae ab! Officia sapiente reiciendis quia amet inventore error dolorem esse nisi asperiores laborum sit odit quae facilis nemo, quo maxime quasi harum officiis, nihil corrupti ab.
                  Optio omnis officia dolorum voluptatibus nisi praesentium et, fugiat ducimus ea doloribus quam ut architecto temporibus unde vitae, autem accusamus illum esse
                  <i class="fa fa-quote-right" aria-hidden="true"></i>
                </p>
              </div>
            </div>
            <div class="carousel-item">
              <div class="detail-box">
                <h5>
                  John Cavill
                </h5>
                <h6>
                  Officia dolom
                </h6>
                <p>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                  Atque itaque deserunt beatae ab! Officia sapiente reiciendis quia amet inventore error dolorem esse nisi asperiores laborum sit odit quae facilis nemo, quo maxime quasi harum officiis, nihil corrupti ab.
                  Optio omnis officia dolorum voluptatibus nisi praesentium et, fugiat ducimus ea doloribus quam ut architecto temporibus unde vitae, autem accusamus illum esse
                  <i class="fa fa-quote-right" aria-hidden="true"></i>
                </p>
              </div>
            </div>
            <div class="carousel-item">
              <div class="detail-box">
                <h5>
                  Lisa Joy
                </h5>
                <h6>
                  Officia dolom
                </h6>
                <p>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                  Atque itaque deserunt beatae ab! Officia sapiente reiciendis quia amet inventore error dolorem esse nisi asperiores laborum sit odit quae facilis nemo, quo maxime quasi harum officiis, nihil corrupti ab.
                  Optio omnis officia dolorum voluptatibus nisi praesentium et, fugiat ducimus ea doloribus quam ut architecto temporibus unde vitae, autem accusamus illum esse
                  <i class="fa fa-quote-right" aria-hidden="true"></i>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- info section -->
  <section class="info_section ">

    <div class="container">
      <div class="info_top ">
        <div class="row ">
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="info_detail">
              <a href="index.html">
                <h4>
                  Fithnyti
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
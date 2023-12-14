
<?php
include_once '../../controller/livraisonC2.php';
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
  header('Location:news.php');
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

  <title>Urotaxi</title>


  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

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


  <!-- news section -->

  <section class="news_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Our <br>
          News
        </h2>
      </div>
      <div class="news_container">
      <?php
        foreach ($list as $livraison) {
        ?>
        <form action="" method="POST">
        <div class="box">
          <div class="date-box">
            <h6>
            <?= $livraison['date'] ?>
            </h6>
          </div>
          <div class="img-box">
            <img src="images/news-img.jpg" alt=""> <!-- image taxi -->
          </div>
          <div class="detail-box">
            <center>
            <h6>
            <?= $livraison['etat_livraison'] ?>
            </h6>
            <p> 
            <?=    $livraison['etat'] ?>
            </p>
            <p> 
            "<?= $livraison['adresse_du_depart'] ?>" VERS "<?= $livraison['adresse_du_arrive']?>"
            </p>

            <?= $livraison['numero_telephone'] ?>
            </center>
            <input type="submit" id="demande" name="demande" class="btnn" value="Passer une demande">
            <input type="hidden" name="id" value="<?php echo $livraison['idliv']; ?>">
            <input type="hidden" name="demandeDate" value="<?php date('Y/m/d'); ?>">
          </div>
        
        </div>
        </form>
        <?php
        }
        ?>
      </div>
    </div>
  </section>

  <!-- end news section -->


  <!-- info section -->

  <section class="info_section layout_padding-top layout_padding2-bottom">
    <div class="container">
      <div class="box">
        <div class="info_form">
          <h4>
            Subscribe Our Newsletter
          </h4>
          <form action="">
            <input type="text" placeholder="Enter your email">
            <div class="d-flex justify-content-end">
              <button>

              </button>
            </div>
          </form>
        </div>
        <div class="info_links">
          <ul>
            <li class=" ">
              <a class="" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="">
              <a class="" href="about.html"> About</a>
            </li>
            <li class="">
              <a class="" href="service.html"> Services </a>
            </li>
            <li class="">
              <a class="" href="news.html"> News</a>
            </li>
            <li class="">
              <a class="" href="contact.html">Contact Us</a>
            </li>
            <li class="">
              <a class="" href="#">Login</a>
            </li>
          </ul>
        </div>
        <div class="info_social">
          <div>
            <a href="">
              <img src="images/fb.png" alt="">
            </a>
          </div>
          <div>
            <a href="">
              <img src="images/twitter.png" alt="">
            </a>
          </div>
          <div>
            <a href="">
              <img src="images/linkedin.png" alt="">
            </a>
          </div>
          <div>
            <a href="">
              <img src="images/instagram.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>

  </section>

  <!-- end info section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <div class="container">
      <p>
        &copy; 2021 All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>


  <!-- owl carousel script -->
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 20,
      navText: [],
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2
        },
        1000: {
          items: 2
        }
      }
    });
  </script>
  <!-- end owl carousel script -->

</body>

</html>
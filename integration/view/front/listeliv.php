<?php
include '../../controller/livraisonC2.php';
$livraisonC2 = new traitement_livraison();
$list = $livraisonC2->listeslivraison();
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

  <!-- about section -->


<label for="search">Search colis:</label>
    <input type="text" id="search" oninput="searchcolis()" placeholder="Enter adresse">
</div


  <section class="about_section layout_padding">
   <a href="ajouterlivraison2.php">Ajouter</a>
    <div class="row">
        <div class="col-lg-4 col-md-5 offset-lg-2 offset-md-1">
        <table id="cartTable" class="table" align="center" width="70%">
            <tr>
            <th>numero livraison</th>
            <th>etat du livraison</th>
            <th>etat du colier</th>
            <th>adresse_depart</th>
            <th>Adresse d'arrivée </th>
            <th>telephone</th>
            <th>date</th>
            <th>delete</th>
            </tr>
        <?php
        foreach ($list as $livraison) {
        ?>
       <tr>
                <td><?= $livraison['idliv'] ?></td>
                <td><?= $livraison['etat_livraison'] ?></td>
                <td><?= $livraison['etat'] ?></td>
                <td><?= $livraison['adresse_du_depart'] ?></td>
                <td><?= $livraison['adresse_du_arrive'] ?></td>
                <td><?= $livraison['numero_telephone'] ?></td>
                <td><?= $livraison['date'] ?></td>
               <td>
                    <a href="deletelivraison.php?idliv=<?php echo $livraison['idliv']; ?>">Delete</a>
        </td>
          <!--  <td>
   <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $livraison['idliv']; ?>)">Delete</a> 
</td>-->

                </td>
            </tr>
        <?php
        }
        ?>
          </table>
        </div>
        
      </div>
  </section>

  <!-- end about section -->


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
  <script>
    // Fonction de recherche dynamique
    function searchcolis() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("cartTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3]; // Change 0 to the index of the Livraison ID column
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Ajoutez un gestionnaire d'événements pour déclencher la recherche à chaque saisie
    document.getElementById("search").addEventListener("input", searchcolis);
</script>



</body>

</html>
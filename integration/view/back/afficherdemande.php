<?php
include '../../controller/livraisonC2.php';
$livraisonC2 = new traitement_livraison();
$demandeC = new DemandeC();
$liste = $demandeC->  listesDemande();
if (isset($_GET['label1']) && !empty($_GET['label1'])) {
  $list= $livraisonC2->showCom($_GET['label1']);
}   
 else if(isset($_POST['tri1']))
    {
    $list=$livraisonC2->trierlivraison();
    session_start();

  } 
    else if(isset($_POST['triasc1']))
  {
    
      $list=$livraisonC2->trierlivraison1();
      session_start();
  }  else{
    $list= $livraisonC2->listeslivraison();
  }

  //stati
    // Créer une instance de la classe livraisonC
    $livraisonC = new traitement_livraison();

    // Récupérer les données pour "EN COURS"
    $livraisonsEnCours = $livraisonC->encours();

    // Récupérer les données pour "récu"
    $livraisonsRecu = $livraisonC->recu();

    // Créer un tableau avec les résultats
    $data = array(
        "En Cours" => count($livraisonsEnCours),
        "Reçu" => count($livraisonsRecu),
    );
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        body {
            position: relative;
        }

        .notification {
            position: fixed;
            bottom: 10px;
            right: 10px;
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            display: none;
        }
    </style>

    <script>
        
        $(document).ready(function() {
            $('.btn-danger').on('click', function(event) {
                event.preventDefault(); // Empêche l'action par défaut du lien
                var message = $(this).data('message');
                showNotification(message);

                // Récupérer l'URL de redirection
                var redirectURL = $(this).attr('href');

                // Rediriger après un court délai
                setTimeout(function() {
                    window.location.href = redirectURL;
                }, 1000); // Rediriger après 1 seconde (ajustez selon vos besoins)
            });

            function showNotification(message) {
                var notification = document.createElement('div');
                notification.className = 'notification';
                notification.textContent = message;

                document.body.appendChild(notification);

                $(notification).fadeIn(function() {
                    // Fermer la notification immédiatement après son affichage
                    setTimeout(function() {
                        $(notification).fadeOut(function() {
                            notification.remove();
                        });
                    }, 5000); // Fermer la notification après 3 secondes (ajustez selon vos besoins)
                });
            }
        });
    </script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #chart-container {
            width: 20%; /* Ajustez la largeur selon vos besoins */
            margin: 0 auto; /* Centre le conteneur */
        }
    </style>
</head>

<body class="">
    <div class="wrapper ">
    <?php include 'navigation.php'; ?>
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
                            <form action="" method="GET">
                                <input type="text" value="" class="form-control" placeholder="Search..." name="label1" id="label1">
                                </form>
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
                                <h4 class="card-title">Table of COLIS</h4>
                                <center>
          <a href="addlivraison.php" class="btn bg-navy btn-flat margin">Ajouter Colis</a>
          <a href="generate_pdf.php" class="btn bg-navy btn-flat margin">PDF</a>
          </center>
                            </div>
                            <form method="POST" action="back.php">
    <input type="submit"  name="tri1" id="tri1"  class="btn bg-navy btn-flat margin" value="tri" ></input>
                                                
  <input type="submit"  name="trieasc1"  id="triasc1"  class="btn bg-navy btn-flat margin" value="triasc" ></input>
  </form> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                              ID LIVRAISON
                                            </th>
                                            <th>
                                              etat du livraison
                                            </th>
                                            <th>
                                              etat du colier
                                            </th>
                                            <th>
                                              adresse_depart
                                            </th>
                                            <th>
                                              Adresse d'arrivée
                                            </th>
                                            <th>
                                            telephone
                                            </th>
                                            <th>
                                            date 
                                            </th>                         
                                           <th>update</th>
                                           <th>delete</th>
                                        </thead>
                                        <tbody>
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
                <td align="center">
                    <form method="POST" action="updatelivraison.php">
                        <input type="submit" name="update" class="btn btn-block btn-primary" value="Update">
                        <input type="hidden" name="idliv" value="<?php echo $livraison['idliv']; ?>">
                        <input type="hidden" name="etat" value="<?php echo $livraison['etat']; ?>">
                        <input type="hidden" name="adresse_du_depart" value="<?php echo $livraison['adresse_du_depart']; ?>">
                        <input type="hidden" name="adresse_du_arrive" value="<?php echo $livraison['adresse_du_arrive']; ?>">
                        <input type="hidden" name="numero_telephone" value="<?php echo $livraison['numero_telephone']; ?>">
                        <input type="hidden" name="date" value="<?php echo $livraison['date']; ?>">
                    </form>
                </td>
                <td>
                <a href="deletelivraisonBack.php?idliv=<?php echo $livraison['idliv'] ?>" class="btn btn-block btn-danger" data-message="suppression avec succées !" >Cancel</a>
</td>

                </td>
            </tr>
                                                <?php
        }
        ?>
       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Table of Demandes</h4>
                            </div>
                            <?php
  $commandeParPage =2;
  $sql = "SELECT idD FROM demande";
$db = config::getConnexion();
try {
    $query = $db->prepare($sql);
    $query->execute();

    $com = $query->rowCount();;
    
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
  $pagesTotales=ceil($com/$commandeParPage);
  if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page']<= $pagesTotales){
  $_GET['page']=intval($_GET['page']);
  $pageCourante=$_GET['page'];
  }else{
    $pageCourante=1;
  }
  $depart=($pageCourante-1)*$commandeParPage;
  ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <th>ID DEMANDE</th>
                                        <th>DATE DE DEMANDE</th>
                                        <th>DESPONIBILITE</th>
                                        <th>livraison</th>
                                        <th>CONDUCTEUR</th>
                                        <th>update</th>
                                        <th>delete</th>
                                       
                                        </thead>
                                        <tbody>
                                        <?php
                     $db = config::getConnexion();
                     $liste=$db->query('SELECT * FROM demande ORDER BY idD DESC LIMIT '.$depart.','.$commandeParPage);
        foreach ($liste as $demande) {
        ?>    <tr>
        <td><?= $demande['idD'] ?></td>
        <td><?= $demande['dateD'] ?></td>
        <td><?= $demande['disponibilite'] ?></td>
        <td><?= $demande['livraison'] ?></td>
        <td><?= $demande['conducteur'] ?></td>
        <td>
        <form method="POST" action="updateDemande.php">
                <input type="submit" name="update" value="Update"  class="btn btn-block btn-primary" >
                <input type="hidden" value=<?PHP echo$demande['idD']; ?> name="idD">
            </form>
        </td>
        <td>
<a href="deleteDemandeBack.php?idD=<?php echo $demande['idD'] ?>" class="btn btn-block btn-danger" data-message="suppression avec succées !"> Cancel</a>
</td>

        </td>
    </tr>
                                                <?php
        }
        ?>
       <?php 
        for($i=1;$i<=$pagesTotales;$i++){
            if($i == $pageCourante){
               
            echo $i.' ';
             
            }else{
            echo '<a href="back.php?page='.$i.'" class="pagee">'.$i.'</a> ';
        }
    }
        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div id="chart-container">
        <canvas id="myPieChart" width="400" height="400"></canvas>
    </div>

            
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul>
                            <li>
                                <a href="https://www.creative-tim.com">
                                    Creative Tim
                                </a>
                            </li>
                            <li>
                                <a href="http://presentation.creative-tim.com">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.creative-tim.com">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
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
<script>
        var ctx = document.getElementById('myPieChart').getContext('2d');

        var data = <?php echo json_encode($data); ?>;

        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    data: Object.values(data),
                    backgroundColor: ['navy', 'orange'], // Couleurs bleu marine et orange
                    borderColor: ['navy', 'orange'],
                    borderWidth: 1
                }]
            }
        });
    </script>


</html>

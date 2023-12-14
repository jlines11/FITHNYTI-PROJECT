
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
        header('Location:back.php');
       // header('Location:ListClients.php');
    } else
        $error = "Missing information";
}


?>


<!DOCTYPE html>
<html lang="en">

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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        body {
            position: relative;
        }

        .notification {
            position: fixed;
            bottom: 10px;
            right: 10px; /* Adjusted to be on the right side */
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            display: none;
        }
    </style>
       <script>
        function showNotification(message) {
            // Create a notification element
            var notification = document.createElement('div');
            notification.className = 'notification';
            notification.textContent = message;

            // Append the notification to the body
            document.body.appendChild(notification);

            // Display the notification
            $(notification).fadeIn();

            // Set a timeout to remove the notification after a certain duration
            setTimeout(function() {
                $(notification).fadeOut(function() {
                    notification.remove();
                });
            }, 5000); // Remove the notification after 5 seconds (adjust as needed)
        }
    </script>
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
                        <a class="navbar-brand" href="#pablo">User Profile</a>
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Add Colis</h5>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" onsubmit="return validateForm()" >
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                            <label for="Nom et prénom">Nom et prénom</label>
                                           <input type="text" class="form-control" id="Nom et prénom" maxlength="20" placeholder="Entrer Votre nom et prenom">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                        <label for="etat">etat du colis</label>
                                        <input type="text" class="form-control" name="etat" id="etat" placeholder="Etat de Colis">
                                      </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                            <label for="address_depart">Address du depart</label>
                                            <input type="text" name="address_depart" id="address_depart" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                            <label for="address_arrive">Adresse d'arrivée</label>
                                            <input type="text" name="address_arrive" id="address_arrive" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label for="tel">telephone</label>
                                            <input type="text" name="tel" id="tel" class="form-control">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                            <label for="date">Date</label>
                      <input type="date" name="date" id="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                    <button type="submit" class="btn btn-primary" onclick="showNotification('This is a notification!')">Submit</button>
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
  function validateForm() {
    var fields = ["Nom et prénom", "etat", "address_depart", "address_arrive", "tel", "date"];

    var allFieldsFilled = fields.every(function(fieldName) {
      var value = document.getElementById(fieldName).value.trim();
      return value !== "";
    });

    if (!allFieldsFilled) {
      alert("Veuillez remplir tous les champs du formulaire.");
      return false;
    }
    var telValue = document.getElementById("tel").value.trim();
    var telPattern = /^[0-9]{8}$/;

    if (!telPattern.test(telValue)) {
      alert("Veuillez saisir un numéro de téléphone valide (8 chiffres numériques uniquement).");
      return false;
    }
    var dateValue = document.getElementById("date").value.trim();
    var currentDate = new Date();
    var selectedDate = new Date(dateValue);

    if (selectedDate < currentDate.setHours(0, 0, 0, 0)) {
      alert("Veuillez sélectionner une date égale ou supérieure à la date d'aujourd'hui.");
      return false;
    }
    
    return true;
  }
</script>

</html>

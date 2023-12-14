<?php
require_once '../../controller/reclamationc.php';
session_start();
$reclamationc = new Reclamationc();
$listereclamations = $reclamationc->affichereclamationsTraiter();
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
                            <h4 class="card-title">Gestion Des Reclamations</h4>
                        </div>
                        <div class="card-body">
                            <a  class="btn btn-dark" href="afficherreclamations.php">Afficher les Reclamations</a>
                            <a class="btn btn-dark" href="afficherreclamationstraite.php">Afficher les Reclamations Traité</a>
                            <a class="btn btn-dark" href="afficherreclamationsnontraite.php">Afficher les Reclamations Non Traité</a>
                            <a class="btn btn-dark" href="afficherreclamationshist.php">Afficher l'Historique des Reclamations</a>
                            <a class="btn btn-dark" href="statistique.php">Statistique</a>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>Titre de la réclamation</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <?php foreach ($listereclamations as $reclamation) { ?>
                                        <tr>
                                            <td><?= $reclamation['titre']; ?></td>
                                            <td><?= $reclamation['description']; ?></td>
                                            <td><?= $reclamation['type']; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#reclamationModal<?= $reclamation['idrec']; ?>">Details</a>
                                                <a class="btn btn-warning" href="afficherreponserec?id=<?= $reclamation['idrec']; ?>">Afficher Reponse</a>
                                                <a href="archiverreclamation.php?id=<?= $reclamation['idrec']; ?>" class="btn btn-info">Archive Reclamation</a>
                                            </td>
                                        </tr>

                                        <!-- Modal pour afficher les détails de la réclamation -->
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
                                                        <img src="../assets/img/<?= $reclamation['image']; ?>"width = "50" height = "50" >                                                        <!-- Ajoutez ici d'autres détails de la réclamation selon vos attributs -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                        <!-- Ajoutez ici d'autres actions pour le modal si nécessaire -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </table>

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


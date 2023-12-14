<?php
include '../../controller/clientC.php';

session_start();

$clientC = new ClientC();
$listClients = $clientC->listClients();

// Update the part where the "tri" button is clicked
if (isset($_POST['tri'])) {
    $listClients = $clientC->trierclient1();// tri
} elseif (isset($_POST['tri1'])) {
    $listClients = $clientC->trierclient(); // Assuming this is your existing sorting method // tri
} else {
    $listClients = $clientC->listClients();
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
    <!-- Fonts and icons -->
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

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" id="searchInput" value="" class="form-control" placeholder="Search..."oninput="filterTable()">
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
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons location_world"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"
                                    aria-labelledby="navbarDropdownMenuLink">
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
                                <h4 class="card-title">Gestion Des Clients</h4>
                            </div>
                            <div class="card-body">
                            <div class="card-body">
    <a class="btn btn-dark" href="statistique3.php">Statistique</a>
    <form method="POST" action="index.php" style="display: inline;">
        <button type="submit" name="tri" id="tri" class="btn btn-dark btn-flat margin">tri ASC</button>  <!-- tri-->
    </form> 

    <form method="POST" action="index.php" style="display: inline;">
        <button type="submit" name="tri1" id="tri1" class="btn btn-dark btn-flat margin">tri DESC</button>  <!-- tri -->
    </form>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Number of Telephone</th>
                                                <th>Address</th>
                                                <th>Date of Birth</th>
                                                <th>Actions</th>
                                                <th>Likes</th>
                                                <th>Generate PDF</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($listClients as $client) : ?>
                                                <tr>
                                                    <td><?php echo $client['idClient']; ?></td>
                                                    <td><?php echo $client['firstName']; ?></td>
                                                    <td><?php echo $client['lastName']; ?></td>
                                                    <td><?php echo $client['email']; ?></td>
                                                    <td><?php echo $client['numtel']; ?></td>
                                                    <td><?php echo $client['address']; ?></td>
                                                    <td><?php echo $client['dob']; ?></td>
                                                    <td>
                                                        <a href="deleteC.php?idClient=<?php echo $client['idClient']; ?>"
                                                            class="btn btn-danger">Delete</a>
                                                        <a href="like.php?idClient=<?php echo $client['idClient']; ?>">
                                                            <button class="btn btn-success like-btn"
                                                                data-client-id="<?php echo $client['idClient']; ?>">Like</button>
                                                        </a>
                                                    </td>
                                                    <td class="like-count"><?php echo $client['likes']; ?></td>
                                                    <td>
                                                        <button class="btn btn-primary generate-pdf"
                                                            data-client-id="<?php echo $client['idClient']; ?>">Generate
                                                            PDF</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
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
                        </script>
                        <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
                        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Core JS Files -->
    <script src="../assets/js/core/jquery.min.js"></script>  <!-- recherche dynamique -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Google Maps Plugin -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!-- Notifications Plugin -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/now-ui-dashboard.js?v=1.0.1"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>

    <script> 
    // recherche
         function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = $("#searchInput");
            filter = input.val().toUpperCase();
            table = $(".table");
            tr = table.find("tr");

            // Loop through all table rows, and hide those who don't match the search query
            tr.each(function () {
                var matchFound = false;
                td = $(this).find("td");
                td.each(function () {
                    txtValue = $(this).text() || $(this).val();
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        matchFound = true;
                        return false; // Break the inner loop if a match is found
                    }
                });

                // Show or hide the row based on the match
                if (matchFound) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            // recherche
        }
        // pdf
        $(document).ready(function () {
            // Add a click event listener to the "Generate PDF" button
            $('.generate-pdf').on('click', function (e) {
                // Prevent the default behavior of the button (i.e., prevent it from submitting a form or navigating)
                e.preventDefault();

                // Get the client ID from the button's data attribute
                var clientId = $(this).data('client-id');

                // Redirect to the generate-pdf.php page with the client ID as a parameter
                window.location.href = 'generate-pdf.php?idClient=' + clientId;
            });
        });// pdf
       
    </script>


</body>

</html>

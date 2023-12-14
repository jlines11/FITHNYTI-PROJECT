<?php include('connect.php');session_start(); ?>

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
<!-- Sales Chart Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <!-- Existing Chart Code -->
            <div class="bg-secondary text-center rounded p-4" style="width:600px; height: 400px;">
                <canvas id="myChart"></canvas>
            </div>

            <?php
            // Fetch the number of clients
            $sqlquery = "SELECT idClient FROM client";
            $result = $conn->query($sqlquery);

            // Count the number of clients
            $totalClients = $result->rowCount();

            // Only display up to 10 clients for better visualization
            $limitedClients = [];
            foreach ($result as $key => $data) {
                if ($key < 10) {
                    $limitedClients[] = $data['idClient'];
                }
            }
            ?>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const ctx = document.getElementById('myChart');

                    new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: <?php echo json_encode($limitedClients); ?>,
                            datasets: [{
                                data: [<?php echo implode(',', array_fill(0, count($limitedClients), 1)); ?>],
                                backgroundColor: <?php echo json_encode(array_fill(0, count($limitedClients), 'rgba(75, 192, 192, 0.2)')); ?>,
                                borderColor: <?php echo json_encode(array_fill(0, count($limitedClients), 'rgba(75, 192, 192, 1)')); ?>,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            cutoutPercentage: 60, // Smaller cutout for a smaller doughnut
                            tooltips: {
                                callbacks: {}
                            }
                        }
                    });

                    // Display the total number of clients
                    document.getElementById('totalClients').innerHTML = 'Total Clients: ' + <?php echo $totalClients; ?>;
                });
            </script>
            
            <!-- Display the total number of clients -->
            <p id="totalClients"></p>

            <!-- New Code for Most Liked Client -->
            <?php
            $mostLikedClientQuery = "SELECT idClient, firstName, likes FROM client ORDER BY likes DESC LIMIT 1";
            $mostLikedClientResult = $conn->query($mostLikedClientQuery);

            if ($mostLikedClientResult->rowCount() > 0) {
                $mostLikedClientData = $mostLikedClientResult->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="bg-info text-center rounded p-4 mt-4">
                    <h4>Most Liked Client</h4>
                    <p>ID: <?php echo $mostLikedClientData['idClient']; ?></p>
                    <p>Name: <?php echo $mostLikedClientData['firstName']; ?></p>
                    <p>Likes: <?php echo $mostLikedClientData['likes']; ?></p>
                </div>
                <?php
            } else {
                ?>
                <p class="mt-4">No clients found.</p>
                <?php
            }
            ?>
        </div>
        <div class="col-sm-12 col-xl-6">
            <!-- ... (other content) ... -->
        </div>
    </div>
</div>
<!-- Sales Chart End -->

<!-- ... (other HTML code) ... -->

</body>
</html>

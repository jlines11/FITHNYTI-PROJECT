<?php include('connect.php'); ?>

<!-- ... (other HTML code) ... -->

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

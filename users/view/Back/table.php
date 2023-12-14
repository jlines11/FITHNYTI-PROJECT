<?php
include '..\..\Controller\clientC.php';
$clientC = new ClientC();
$listClients = $clientC->listClients();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!-- Your other scripts and styles go here -->
</head>
<body>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Client Data Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Number of Telephone</th>
                                            <th>Address</th>
                                            <th>Date of Birth</th>
                                            <th>Actions</th>
                                            <th>Likes</th> <!-- New column for likes -->
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
                                                    <a href="deleteC.php?idClient=<?php echo $client['idClient']; ?>" class="btn btn-danger">Delete</a>
                                                    <button class="btn btn-success like-btn" data-client-id="<?php echo $client['idClient']; ?>">Like</button>
                                                </td>
                                                <td class="like-count"><?php echo $client['likes']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function () {
            $('#example2').DataTable();

            // Add event listener to the "Like" button
            $('.like-btn').on('click', function () {
                var clientId = $(this).data('client-id');

                // Make an AJAX request to like the client
                $.ajax({
                    url: 'like.php?likeClient=true&clientId=' + clientId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            // Update the like count on the page
                            var likeCount = $('.like-count[data-client-id="' + clientId + '"]');
                            likeCount.text(parseInt(likeCount.text()) + 1);
                        } else {
                            alert('Error liking client: ' + response.message);
                        }
                    },
                    error: function () {
                        alert('Error liking client');
                    }
                });
            });
        });
    </script>
</body>
</html>

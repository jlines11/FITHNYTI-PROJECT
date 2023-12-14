<?php
if (isset($_GET['likeClient']) && isset($_GET['clientId'])) {
    include '..\..\Controller\clientC.php';
    $clientC = new ClientC();
    $clientId = $_GET['clientId'];

    $likeResult = $clientC->likeClient($clientId);

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($likeResult);
    exit;
}
?>

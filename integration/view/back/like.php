<?php
require_once '../../controller/clientC.php';
session_start();

// Assuming you are getting the ID from the query string
$idClient = $_GET["idClient"];

// Create an instance of the ClientC class
$clientC = new ClientC();

// Get the client details using the provided ID
$client = $clientC->getClientByIdDirectly($idClient);

// Increment the like count (modify as needed based on your client structure)
$likes = $client['likes'] + 1;

// Update the like count in the database (modify as needed based on your client structure)
$clientC->likeClient($idClient);

// Redirect back to the client listing page
header("Location: index.php");
?>

<?php
include_once '../../controller/clientC.php';
$clientC = new ClientC();
$clientC->deleteClient($_GET["idClient"]);
header('Location:index.php');

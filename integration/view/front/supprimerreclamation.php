<?php
require_once '../../controller/reclamationc.php';

$id = $_GET["id"];
$reclamationController = new Reclamationc();
$reclamationController->supprimerreclamation($id);
header("Location: affichierreclamation.php");
?>

<?php
require_once '../../controller/Reclamationc.php';
session_start();
$id = $_GET["id"];
$rec = new Reclamationc();
$rec->archiverreclamation($id);
header("Location: afficherreclamations.php");

?>

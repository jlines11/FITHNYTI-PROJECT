<?php
require_once '../../controller/Reclamationc.php';
$id = $_GET["id"];
$rec = new Reclamationc();
$rec->dearchiverreclamation($id);
header("Location: afficherreclamations.php");

?>
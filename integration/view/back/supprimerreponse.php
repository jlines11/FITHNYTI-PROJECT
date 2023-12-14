<?php
require_once '../../controller/ReponseAdminc.php';
$id = $_GET["supprimer"];session_start();
$reponsec = new ReponseAdminc();
$reponsec->supprimerreponse($id);
header("Location: afficherreclamations.php");

?>
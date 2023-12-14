<?php
require_once '../../controller/evenementc.php';
$id=$_GET["supprimer"];session_start();
$evenmentc=new Evenementc();
$evenment=$evenmentc->supprimerevenement($id);
header("Location: affichierevenement.php");
?>
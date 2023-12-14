<?php
require_once '../../controller/participationc.php';
session_start();
$id=$_GET["supprimer"];
$participantc=new Participationc();
$part=$participantc->supprimerparticipation($id,$_SESSION["idClient"]);
header("Location: affichierevenementparticiper.php");
?>
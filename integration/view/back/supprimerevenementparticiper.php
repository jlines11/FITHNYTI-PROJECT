<?php
require_once '../../controller/participationc.php';session_start();
$id=$_GET["supprimer"];
$idevent=$_GET["event"];
$participationc=new Participationc();
$part=$participationc->supprimerparticipation($id,$idevent);
header("Location: affichierevenement.php");
?>
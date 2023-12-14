<?php
require_once '../../controller/evenementc.php';
session_start();
$id = $_GET["id"];
$ev = new Evenementc();
$event=$ev->getevenet($id);
$nblike=$event['nblike']+1;
$ev->likeevt($id,$nblike);
header("Location: affichierevenementfront.php");

?>
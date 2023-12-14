<?php
require_once '../../controller/ReponseAdminc.php';

$id = $_GET["id"];
$idrec = $_GET["idrec"];
$rep = new ReponseAdminc();
$reponse=$rep->getreponse($id);
$nblike=$reponse['nblike']+1;
$rep->likerep($id,$nblike);
header("Location: affichierreponse.php?id=$idrec");

?>
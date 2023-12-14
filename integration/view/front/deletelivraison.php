<?php
include '../../Controller/livraisonC2.php';
$livraison = new traitement_livraison();
$livraison->deletelivraison($_GET["idliv"]);
header('Location:listeliv.php');
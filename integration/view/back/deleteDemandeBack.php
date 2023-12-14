<?php
include_once '../../Controller/livraisonC2.php';

$demandeC = new DemandeC();
if (isset($_GET["idD"])) {
    $idDemande = $_GET["idD"];
    $demandeC->deleteDemande($idDemande);
    header('Location: afficherdemande.php');
    exit();
} else {
    echo "ID manquante";
}
?>

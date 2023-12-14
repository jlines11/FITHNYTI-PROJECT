<?php
include_once '../../Controller/livraisonC2.php';

$demandeC = new DemandeC();

// Vérifiez si "idD" est défini dans $_GET avant de l'utiliser
if (isset($_GET["idD"])) {
    $idDemande = $_GET["idD"];

    // Utilisez une requête préparée pour éviter les attaques par injection
    $demandeC->deleteDemande($idDemande);

    // Redirigez l'utilisateur vers la page listdemande.php
    header('Location: listedemande.php');
    exit();
} else {
    echo "ID manquante";
}
?>

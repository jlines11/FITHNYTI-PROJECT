<?php

include '../../Controller/livraisonC2.php';

$error = "";

// create client
$livr = null;







// create an instance of the controller
$ge_liv = new traitement_livraison();
$livr = new livraison ($_POST['idliv'], $_POST['etat'],$_POST['adresse_du_depart'],$_POST['adresse_du_arrive'],$_POST['numero_telephone'] ,new DateTime($_POST['date']));
$livr = $livr->set_Etat_livraison("réçu") ;

$ge_liv->update_livraison($livr, $_POST["idliv"]);

header('Location:back.php');

?>
<?php
require('../../fpdf/fpdf.php');
include '../../controller/livraisonC2.php';

$livraisonC2 = new traitement_livraison();
$list = $livraisonC2->listeslivraison();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Liste des livraisons', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);

// Ajouter des en-têtes
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(30, 10, 'Etat Livraison', 1);
$pdf->Cell(20, 10, 'Etat', 1);
$pdf->Cell(40, 10, 'Adresse Depart', 1);
$pdf->Cell(40, 10, 'Adresse Arrive', 1);
$pdf->Cell(30, 10, 'Telephone', 1);
$pdf->Cell(30, 10, 'Date', 1);
$pdf->Ln(); // Aller à la ligne

// Afficher chaque élément de la liste
$pdf->SetFont('Arial', '', 12);
foreach ($list as $livraison) {
    $pdf->Cell(20, 10, $livraison['idliv'], 1);
    $pdf->Cell(30, 10, $livraison['etat_livraison'], 1);
    $pdf->Cell(20, 10, $livraison['etat'], 1);
    $pdf->Cell(40, 10, $livraison['adresse_du_depart'], 1);
    $pdf->Cell(40, 10, $livraison['adresse_du_arrive'], 1);
    $pdf->Cell(30, 10, $livraison['numero_telephone'], 1);
    $pdf->Cell(30, 10, $livraison['date'], 1);
    $pdf->Ln(); // Aller à la ligne
}

$pdf->Output('liste_livraisons.pdf', 'D');
?>

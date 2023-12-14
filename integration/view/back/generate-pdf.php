<?php
require('../../fpdf/fpdf.php');
include '../../controller/clientC.php';

if (isset($_GET['idClient'])) {
    $idClient = $_GET['idClient'];

    $clientC = new ClientC();

    // Assuming you have a method to retrieve a client by ID directly from the database
    $client = $clientC->getClientByIdDirectly($idClient);

    if ($client) {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Client Details', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);

        // Add content using $client object
        $pdf->Cell(30, 10, 'ID', 1);
        $pdf->Cell(50, 10, 'First Name', 1);
        $pdf->Cell(50, 10, 'Last Name', 1);
        $pdf->Cell(50, 10, 'Email', 1);
        $pdf->Cell(40, 10, 'Telephone', 1);
        $pdf->Ln(); // Go to the next line

        // Display client details
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(30, 10, $client['idClient'], 1);
        $pdf->Cell(50, 10, $client['firstName'], 1);
        $pdf->Cell(50, 10, $client['lastName'], 1);
        $pdf->Cell(50, 10, $client['email'], 1);
        $pdf->Cell(40, 10, $client['numtel'], 1);
        $pdf->Ln(); // Go to the next line

        $pdf->Output('client_details_' . $client['idClient'] . '.pdf', 'D');
    } else {
        echo 'Client not found.';
    }
} else {
    echo 'Invalid request.';
}
?>

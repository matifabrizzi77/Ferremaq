<?php
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(80, 10, 'Esto es una celda de 40 x 10', 1);
$pdf->Cell(50, 10, 'Celda de 50 x 10', 1);
$pdf->Ln(10);
$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(80, 10, 'Esto es una celda de 40 x 10', 0);
$pdf->Cell(50, 10, 'Celda de 50 x 10', 0);
$pdf->Output();
?>
 

 
 
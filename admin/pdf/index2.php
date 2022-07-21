<?php
include('database.php');
$database = new Database();
$result = $database->runQuery("SELECT * FROM patient_details");
$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='donation' 
AND `TABLE_NAME`='patient_details'
and `COLUMN_NAME` in ('id','name','disease','organ','age','bloodgroup')");

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(33,13,$column_heading,1);
}
foreach($result as $row) {
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(33,13,$column,1);
}

$pdf->Output();
?>
<?php
include('database.php');
$database = new Database();
$result = $database->runQuery("SELECT booking_id,name,amount,transaction FROM tbl_order");
$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='laundry' 
AND `TABLE_NAME`='tbl_order'
and `COLUMN_NAME` in ('booking_id','name','amount','transaction')");

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(40,13,$column_heading,1);
}
foreach($result as $row) {
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(40,13,$column,1);
}

$pdf->Output();
?>
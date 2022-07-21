<?php
include('database.php');
$database = new Database();
$result = $database->runQuery("SELECT tbl_bookslot.booking_id,tbl_bookslot.booking_date,tbl_bookslot.laundry_type,tbl_bookslot.cloth_type,tbl_bookslot.wash_type,tbl_bookslot.quantity,tbl_bookslot.booking_date,tbl_bookslot.delivery_date,tbl_bookslot.status,tbl_order.transaction,tbl_order.address,tbl_order.name,tbl_order.booking_id,tbl_order.login_id,tbl_login.login_id,tbl_login.email from tbl_bookslot join tbl_order on tbl_bookslot.booking_id=tbl_order.booking_id join tbl_login on tbl_order.login_id=tbl_login.login_id where tbl_bookslot.status ='1'");
$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='laundry' 
AND `TABLE_NAME`='tbl_order','tbl_login','tbl_bookslot'
and `COLUMN_NAME` in ('booking_id','email','laundry_type','cloth_type','wash_type','booking_date','quantity','amount','status')");

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
<?php
//include connection file
include_once("connection.php");
include_once('../../../../libs/fpdf.php');
 
class PDF extends FPDF
{


}

 
$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('id'=>'ID', 'commandeRef'=> 'commandeRef', 'produit'=> 'produit','prix'=> 'prix','date'=> 'date','mode'=> 'mode',);
 
$result = mysqli_query($connString, "SELECT id, commandeRef, produit, prix, date, mode FROM paiement") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM paiement");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
}
$pdf->Output();
?>
<?php
require('fpdf/fpdf.php');
date_default_timezone_set('America/El_Salvador');
class PDF extends FPDF
{

function Header()
{

}

function Footer()
{
      
}


}



$pdf = new PDF();
$pdf->AliasNbPages();

// Primera forma de hacerlo
$pdf->AddPage('L');


// Segunda forma de hacerlo
// $pdf=new FPDF('P','mm',array(100,200));
// $pdf->AddPage();

/* Añadimos el nuevo tipo de letra */
$pdf->AddFont('Anton-Regular','','Anton-Regular.php');
/* Declaramos que queremos usar ese tipo de letra */
$pdf->SetFont('Anton-Regular','',35);
/* Lo imprimimos */
$pdf->Cell(200,30,'Reportes Graficos',0,1,'C',0);


$grafico=$_POST['variable'];

$img = explode(',',$grafico,2)[1];
$pic = 'data://text/plain;base64,'. $img;
$pdf->image($pic, 20,50,300,0,'png');


$pdf->Output();
?>
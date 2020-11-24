<?php
define('FPDF_FONTPATH', 'font/');
require('fpdf/fpdf.php');
include("db/connection.php");

session_start();

$user = $_SESSION['nome'];

$pdf = new FPDF('P','mm','A4');

$pdf->SetAutoPageBreak(false);

$pdf->AddPage();

$y_axis_initial = 80;//MARGIN TOP DO RESULT DA TABELA


$pdf->Image('aselc_cabecalho.png',10,10,-300);
$pdf->Image('aselc_rodape.png',10,280, -300);


$pdf->SetFillColor(255,255,255);
$pdf->SetFont('helvetica','',10);
$pdf->Cell(190,50,utf8_decode('REPOSIÇÃO DE ITENS'),0,0,'C');

$pdf->SetY(30);
$pdf->Cell(220,50,utf8_decode('Bom dia,'),0,0,'');
$pdf->SetY(35);
$pdf->Cell(220,50,utf8_decode('Necessitamos dos seguintes itens para reposição,'),0,0,'');

$pdf->SetY(80);//MARGIN TOP DO TITLE DA TABELA
$pdf->SetX(5);

$pdf->Cell(30,6,'QUANTIDADE',2,0,'C',1);
$pdf->Cell(90,6,'ITEM',2,0,'C',1);

$pdf->SetY(110);
$pdf->Cell(220,50,utf8_decode('Atenciosamente,'),0,0,'');
$pdf->SetY(115);
$pdf->Cell(220,50,utf8_decode("$user"),0,0,'');

$pdf->SetY(125);
$pdf->Cell(220,50,utf8_decode('Tecnologia da Informação - HRPA'),0,0,'');

$row_height = 6;

$y_axis_initial = $y_axis_initial + $row_height;

$result=mysqli_query($connection,"select nm_equipamento, qtd_equipamento from tb_solic_item WHERE nm_tecnico = '$user' ORDER BY date_cad_solic DESC LIMIT 1");

$i = 0;

$max = 25;


while($row = mysqli_fetch_array($result))
{
    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    {
        $pdf->AddPage();

        //print column titles for the current page
        $pdf->Image('aselc_cabecalho.png',50,10,-300);
        $pdf->Image('aselc_rodape.png',50,180, -300);
        $pdf->SetY(70);
        $pdf->SetX(5);
        $pdf->Cell(50,6,'QUANTIDADE',2,0,'C',1);
        $pdf->Cell(120,6,'ITEM',2,0,'C',1);
        
        
        //Go to next row
        $y_axis_initial = 60;
        
        //Set $i variable to 0 (first row)
        $i = 0;
    }

    $qtd_equipamento = $row['qtd_equipamento'];
    $nm_equipamento = $row['nm_equipamento'];
    
   
    $pdf->SetY($y_axis_initial);
    $pdf->SetX(5);
    
    $pdf->Cell(30,6,$qtd_equipamento,2,0,'C',1);
    $pdf->Cell(90,6,$nm_equipamento,2,0,'C',1);
    
    
    //Go to next row
    $y_axis_initial = $y_axis_initial + $row_height;
    $i = $i + 1;
    
}

mysqli_close($connection);

//Send file
$pdf->Output();
?>
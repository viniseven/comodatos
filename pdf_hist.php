<?php

$data_init = $_POST['data-inicio'];
$data_fim = $_POST['data-fim'];

define('FPDF_FONTPATH', 'font/');
require('fpdf/fpdf.php');
include("db/connection.php");

$pdf = new FPDF('L','mm','A4');

$pdf->SetAutoPageBreak(false);

$pdf->AddPage();

$y_axis_initial = 50;


$pdf->Image('aselc_cabecalho.png',50,10,-300);
$pdf->Image('aselc_rodape.png',50,180, -300);


$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(270,50,utf8_decode('HISTÓRICO DE SOLICITAÇÕES E RECEBIMENTOS'),0,0,'C');
$pdf->SetY($y_axis_initial);
$pdf->SetX(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,6,'FORNECEDOR',2,0,'C',1);
$pdf->Cell(90,6,'EQUIPAMENTO',2,0,'C',1);
$pdf->Cell(7,6,'QTD',2,0,'C',1);
$pdf->Cell(60,6,utf8_decode('TÉCNICO'),2,0,'C',1);
$pdf->Cell(50,6,'TIPO',2,0,'C',1);
$pdf->Cell(30,6,'DATA',2,0,'C',1);
$pdf->SetFont('Arial','',11);


$row_height = 6;

$y_axis_initial = $y_axis_initial + $row_height;

$result=mysqli_query($connection,"select fornecedor, nm_equipamento, qtd_equipamento, nm_tecnico, tipo, dt_data from tb_hist_solic_receb 
WHERE dt_data between '$data_init' AND '$data_fim'");

$i = 0;

$max = 20;


while($row = mysqli_fetch_array($result))
{
    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    {
        $pdf->AddPage();

        
        $pdf->Image('aselc_cabecalho.png',50,10,-300);
        $pdf->Image('aselc_rodape.png',50,180, -300);   
        $pdf->SetY(52);
        $pdf->SetX(5);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(50,6,'FORNECEDOR',2,0,'C',1);
        $pdf->Cell(90,6,'EQUIPAMENTO',2,0,'C',1);
        $pdf->Cell(7,6,'QTD',2,0,'C',1);
        $pdf->Cell(60,6,utf8_decode('TÉCNICO'),2,0,'C',1);
        $pdf->Cell(50,6,'TIPO',2,0,'C',1);
        $pdf->Cell(30,6,'DATA',2,0,'C',1);
        $pdf->SetY(200);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,5,utf8_decode('Pág. ').$pdf->PageNo());
        $pdf->SetFont('Arial','',11);
        //Go to next row
        $y_axis_initial = 60;
        
        //Set $i variable to 0 (first row)
        $i = 0;
    }

    $fornecedor = $row['fornecedor'];
    $equipamento = $row['nm_equipamento'];
    $quantidade = $row['qtd_equipamento'];
    $tecnico = $row['nm_tecnico'];
    $tipo = $row['tipo'];
    $data= $row['dt_data'];

    $pdf->SetY($y_axis_initial);
    $pdf->SetX(5);
    $pdf->Cell(50,6,$fornecedor,2,0,'C',1);
    $pdf->Cell(90,6,$equipamento,2,0,'C',1);
    $pdf->Cell(7,6,$quantidade,2,0,'C',1);
    $pdf->Cell(64,6,$tecnico,2,0,'C',1);
    $pdf->Cell(43,6,$tipo,2,0,'C',1);
    $pdf->Cell(35,6,$data,2,0,'C',1);
    
    //Go to next row
    $y_axis_initial = $y_axis_initial + $row_height;
    $i = $i + 1;
}

mysqli_close($connection);


$pdf->Output();

?>
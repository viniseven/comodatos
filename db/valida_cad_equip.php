<?php

session_start();
include("connection.php");


$id = uniqid();
$equip = mysqli_real_escape_string($connection, trim(utf8_decode($_POST['item'])));
$marca = mysqli_real_escape_string($connection, trim(utf8_decode($_POST['marca'])));
$qtd = mysqli_real_escape_string($connection, trim($_POST['quantidade']));
$fornecedor = mysqli_real_escape_string($connection, trim($_POST['fornecedor']));



$sql = "select count(*) as total from tb_equipamentos WHERE nm_equipamento = '$equip' AND marca = '$marca'";

$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
   
    $cont = "UPDATE tb_equipamentos SET qtd_equipamento = qtd_equipamento + '$qtd' WHERE nm_equipamento = '$equip' AND marca = '$marca'";
    
    if($connection->query($cont) === TRUE){
        echo "<script>alert('Quantidade de Produto Acrescentada'); location='../home.php'</script>";
      } 

   }else{
    $cont = "INSERT INTO tb_equipamentos (id, nm_equipamento, marca, qtd_equipamento, fornecedor, date_cad_equip) VALUES ('$id', '$equip', '$marca', '$qtd', '$fornecedor', NOW())";
    if($connection->query($cont) === TRUE){
        echo "<script>alert('Cadastro Realizado'); location='../home.php'</script>";
      } 
   }



?>


<?php


session_start();
include("connection.php");


$id = uniqid();
$fornecedor = mysqli_real_escape_string($connection, trim($_POST['fornecedor']));
$nm_tecnico = mysqli_real_escape_string($connection, trim(utf8_decode($_SESSION['nome'])));
$equip = mysqli_real_escape_string($connection, trim(utf8_decode($_POST['equipamento'])));
$qtd = mysqli_real_escape_string($connection, trim($_POST['quantidade']));

$cd_receb_solic = rand(0, 9999);


$receb_item = "INSERT INTO tb_receb_item (id, cd_receb_solic,fornecedor, nm_tecnico, nm_equipamento, qtd_equipamento, date_cad_receb) 
VALUES ('$id','$cd_receb_solic','$fornecedor', '$nm_tecnico', '$equip', '$qtd', NOW())";

$tipo = 'Recebimento';



if($connection->query($receb_item) === TRUE){
    echo "<script>alert('Cadastro de Recebimento Concluída'); location='../home.php'</script>";
    
    //ATUALIZAR DADOS DA TABLE SUBTRAINDO A QUANTIDADE SOLICITADA PELA QUANTIDADE RECEBIDA
    mysqli_query($connection, "UPDATE tb_solic_item SET qtd_equipamento = qtd_equipamento - '$qtd' 
    WHERE nm_equipamento = '$equip' AND fornecedor = '$fornecedor'");
     
     //ATUALIZA A TABELA EQUIPAMENTOS AUMENTANDO A QUANTIDADE DE ACORDO COM A QUANTIDADE RECEBIDA
     mysqli_query($connection, "UPDATE tb_equipamentos SET qtd_equipamento = qtd_equipamento + '$qtd' 
     WHERE nm_equipamento = '$equip' AND fornecedor = '$fornecedor'");

    //INSERE DADOS DE SOLICITAÇÃO DA TABLE DE HISTÓRICO DE SOLICITAÇÃO
    mysqli_query($connection, "INSERT INTO tb_hist_solic_receb (id, fornecedor, nm_equipamento, qtd_equipamento, nm_tecnico, tipo, dt_data)
    VALUES ('$id', '$fornecedor', '$equip', '$qtd', '$nm_tecnico', '$tipo', NOW())");
    
    mysqli_query($connection, "DELETE FROM tb_solic_item WHERE nm_equipamento = '$equip' AND '$qtd' > qtd_equipamento");
    
    $sql = "select count(*) as total from tb_solic_item WHERE qtd_equipamento = 0";
    
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    

    if($row['total'] == 1){
        mysqli_query($connection, "DELETE FROM tb_solic_item  WHERE nm_equipamento = '$equip'");
    }
}else{
        echo "<script>alert('Cadastro de Recebimento Não Realizado, provável erro de conexão ao banco'); location='../home.php'</script>";

}


?>
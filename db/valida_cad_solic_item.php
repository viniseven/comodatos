<?php



session_start();
include("connection.php");


$id = uniqid();
$fornecedor = mysqli_real_escape_string($connection, trim($_POST['fornecedor']));
$equip = mysqli_real_escape_string($connection, trim(utf8_decode($_POST['equipamento'])));
$qtd = mysqli_real_escape_string($connection, trim($_POST['quantidade']));  
$defeito = mysqli_real_escape_string($connection, trim(utf8_decode($_POST['defeito'])));
$setor = mysqli_real_escape_string($connection, trim(utf8_decode($_POST['setor'])));
$nm_tecnico = mysqli_real_escape_string($connection, trim(utf8_decode($_SESSION['nome'])));
$tipo_solic = mysqli_real_escape_string($connection, trim(utf8_decode($_POST['tipo_solic'])));

$cd_solic = rand(0, 9999);


$tipo = utf8_decode('Solicitação');
    

    for($i = 0; $i < 3; $i++){

    $cont = "INSERT INTO tb_solic_item (id, cd_solic, fornecedor, nm_equipamento, qtd_equipamento, tp_solicitacao, defeito, setor, nm_tecnico, date_cad_solic) VALUES ('$id', '$cd_solic', '$fornecedor', '$equip', '$qtd', '$tipo_solic', '$defeito', '$setor', '$nm_tecnico' ,NOW())";
    }
    if($connection->query($cont) === TRUE){
        //echo "<script>alert('Cadastro de Solicitação Realizada'); location='../pdfsolic.php'</script>";
        echo "<script>alert('Cadastro de Solicitação Realizada'); location='../pdfsolic.php'</script>";
        mysqli_query($connection, "INSERT INTO tb_hist_solic_receb (id, fornecedor, nm_equipamento, qtd_equipamento, nm_tecnico, tipo, dt_data)
        VALUES ('$id', '$fornecedor', '$equip', '$qtd', '$nm_tecnico', '$tipo', NOW())"); 
       
   }else{
       echo "<script>alert('Cadastro de Solicitação Não Realizado, provável erro de conexão ao banco'); location='../home.php'</script>";
   }

?>
<?php

  header('Content-type: text/html; charset=ISO-8859-1');
  session_start();
  include("connection.php");

  

   $id = uniqid();
   $nm_forn = mysqli_real_escape_string($connection, trim(utf8_decode($_POST['name-empresa'])));
   $cnpj = mysqli_real_escape_string($connection, trim($_POST['cnpj']));
   $responsavel = mysqli_real_escape_string($connection, trim(utf8_decode($_POST['resp-empresa'])));
   $telefone = mysqli_real_escape_string($connection, trim($_POST['telefone-emp']));
   $email = mysqli_real_escape_string($connection, trim($_POST['email-emp']));
   $ds_obs = mysqli_real_escape_string($connection, trim(utf8_decode($_POST['obs-emp'])));
   
  

   $sql = "select count(*) as total from tb_fornecedor WHERE cnpj = '$cnpj'";
   $result = mysqli_query($connection, $sql);
   $row = mysqli_fetch_assoc($result);

   if($row['total'] == 1){
    
    echo "<script>alert('Fornecedor já cadastrado!'); location='../home.php'</script>";
     exit;
   }

   $sql = "INSERT INTO tb_fornecedor (id, nm_forn, cnpj, nm_resp, telefone, email, ds_obs, date_cad) VALUES ('$id', '$nm_forn', '$cnpj', '$responsavel', '$telefone', '$email', '$ds_obs', NOW())";
    
   if($connection->query($sql) === TRUE){
   }

   echo "<script>alert('Cadastro de Fornecedor Realizado'); location='../home.php'</script>";
   exit;


?>
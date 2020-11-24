<?php

  header('Content-type: text/html; charset=ISO-8859-1');
   session_start();
   include("connection.php");

  

   $id = uniqid();
   $nome_user = mysqli_real_escape_string($connection, trim(utf8_decode($_POST['input_nome'])));
   $sobrenome_user = mysqli_real_escape_string($connection, trim(utf8_decode($_POST['input_sobrenome'])));
   $username = mysqli_real_escape_string($connection, trim(utf8_decode($_POST['input_username'])));
   $pass = mysqli_real_escape_string($connection, trim(md5($_POST['input_password1'])));
   
   
  

   $sql = "select count(*) as total from tb_usuarios WHERE username = '$username'";
   $result = mysqli_query($connection, $sql);
   $row = mysqli_fetch_assoc($result);

   if($row['total'] == 1){
    echo "<script>alert('Usuario ja Cadastrado'); location='../page_cadastro.php'</script>";
     exit;
   }

   $sql = "INSERT INTO tb_usuarios (id, nome, sobrenome, username, password, date_cad) VALUES ('$id', '$nome_user','$sobrenome_user', '$username', '$pass', NOW())";
    
   if($connection->query($sql) === TRUE){
     $_SESSION['status_cadastro'] = true;
   }

   $connection->close();

   echo "<script>alert('Cadastro Realizado'); location='../index.php'</script>";
   exit;


?>
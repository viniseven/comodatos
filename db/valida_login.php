<?php

ini_set('default_charset','UTF-8');
session_start();
include("connection.php");



$username = mysqli_real_escape_string($connection, trim($_POST['input_username']));
$pass = mysqli_real_escape_string($connection, trim(md5($_POST['input_password'])));


$sql = "SELECT nome, sobrenome FROM tb_usuarios WHERE username = '$username' AND password = '$pass'";

$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_row($result);


if($row){
     $_SESSION['login'] = 1;
     $_SESSION['nome'] = $row[0];
     $_SESSION['sobrenome'] = $row[1];


    echo "<script>alert('Login Sucess'); location='../home.php'</script>";
     exit;
   }else
   {
    echo "<script>alert('Usuário não cadastrado ou dados incorretos'); location='../index.php'</script>";
   }

   mysqli_close($connection);

?>
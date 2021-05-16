<?php
session_start();
if(isset($_SESSION["Logado"])){
    $descricao = $_GET["descricao"];
    $observacao = $_GET["observ"];
    $id = $_GET["idusuario"];

    $pdo = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', "root", "");
    $sql = "insert into relato (descricao,observ,usuario_idusuario)  Values(?,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute(array($descricao,$observacao,$id));
    $pdo = null;
    echo"<script> alert('Cadastro realizado');</script>";
    echo"<form method='get' action='Ler.php'>";
    echo "<input type='text' name='idusuario' id='idusuario' value='$id' hidden>";
    echo "<input type='submit' name='entrar' id='entrar' value='' hidden> ";
    echo"<script>document.getElementById('entrar').click();</script>";
} else{
    echo "<script>alert('Você não tem permissão p/ acessar esta página');</script>";
    echo "<script>window.location='Entrar.html';</script>";
}
?>

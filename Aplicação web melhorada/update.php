<?php
session_start();
if(isset($_SESSION["Logado"])){
    $idrelato = $_GET["idrelato"];
    $usuario_idusuario = $_GET["usuario"];
    $descricao = $_GET["descricao"];
    $observacao = $_GET["observ"];

    $pdo = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', "root", "");	                
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE relato set descricao = ?, observ = ?, usuario_idusuario = ? WHERE idrelato = ?";
    $query = $pdo->prepare($sql);
    $query ->execute(array($descricao,$observacao, $usuario_idusuario, $idrelato ));      
    echo"<script> alert('Alteração realizado');</script>";
    echo"<form method='get' action='Ler.php'>";
    echo "<input type='text' name='idusuario' id='idusuario' value='$usuario_idusuario' hidden>";
    echo "<input type='submit' name='entrar' id='entrar' value='' hidden> ";
    echo"<script>document.getElementById('entrar').click();</script>";          
    $pdo = null;
} else{
    echo "<script>alert('Você não tem permissão p/ acessar esta página');</script>";
    echo "<script>window.location='Entrar.html';</script>";
}              
?>

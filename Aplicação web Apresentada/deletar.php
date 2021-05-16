<?php
session_start();
if(isset($_SESSION["Logado"])){
	$idrelato = $_GET["idrelato"];
	$usuario=$_GET["idusuario"];
	$pdo = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', "root", "");
	$sql = "delete from relato where idrelato = ?";
	$query = $pdo->prepare($sql);
	$query->execute(array($idrelato));
	$pdo = null;
	echo"<script> alert('Deletado!!');</script>";
			echo"<form method='get' action='ler.php'>";
			echo "<input	type='text' name='idusuario' id='idusuario' value='$usuario' hidden>";
			echo "<input	type='submit' name='entrar' id='entrar' value='' hidden> ";
			echo"<script>document.getElementById('entrar').click();</script>";
			echo" </form>";
		} else{
			echo "<script>alert('Você não tem permissão p/ acessar esta página');</script>";
			echo "<script>window.location='Entrar.html';</script>";
		}
?>
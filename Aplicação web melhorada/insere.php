<?php
	$nome = $_GET["nome"];
	$usuario = $_GET["usuario"];
	$senha = $_GET["senha"];
	$cpf = $_GET["cpf"];
	$tel = $_GET["tel"];
	$rg= $_GET["rg"];
	$endereco= $_GET["endereco"];
	$nasc= $_GET["ano"].$_GET["mes"].$_GET["dat"];
	$opcao= $_GET["radio-stacked"];
	$email=$_GET["email"];

	if($opcao==2){
		$idFunc= $_GET["idFunc"];
		$pdo = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', "root", "");
		$sql = "insert into funcionario (nome_fun, usuario_fun, telefone_fun, endereco_fun, cpf_fun, rg_fun, dat_nasc_fun, registro_func, senha_func, email_fun)  Values(?,?,?,?,?,?,?,?,?,?)";
		$query = $pdo->prepare($sql);
		$query->execute(array($nome,$usuario,$tel,$endereco,$cpf,$rg,$nasc,$idFunc,$senha,$email));
		$pdo = null;
		echo"<script> alert('Cadastro realizado');</script>";
		echo "<script> window.location='Entrar.php';</script>";
	}else{
		$pdo = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', "root", "");
		$sql = "insert into usuario (nome_usu, usuario_usu, telefone_usu, endereco_usu, cpf_usu, rg_usu, dat_nasc, senha_usu, email_usu)  Values(?,?,?,?,?,?,?,?,?)";
		$query = $pdo->prepare($sql);
		$query->execute(array($nome,$usuario,$tel,$endereco,$cpf,$rg,$nasc,$senha,$email));
		$pdo = null;
		echo"<script> alert('Cadastro realizado');</script>";
		echo "<script> window.location='Entrar.php';</script>";
	}
?>
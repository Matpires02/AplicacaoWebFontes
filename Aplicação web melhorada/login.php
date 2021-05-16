<?php
	$usuarioFormulario=$_GET['usuario'];
	$senhaFormulario=$_GET['senha'];
	$opcao=$_GET['radio-stacked'];
    if($opcao==2){
		if($usuarioFormulario!=''||$senhaFormulario!=''){

	    $pdo = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', "root", "");
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $consulta = $pdo->prepare("SELECT * FROM funcionario where usuario_fun = :usuario and senha_func = :senha");
	    $consulta->bindParam(":usuario", $_GET['usuario'], PDO::PARAM_STR);
	    $consulta->bindParam(":senha", $_GET['senha'], PDO::PARAM_STR);

		$consulta->execute();
	    $linha = $consulta->fetch(PDO::FETCH_ASSOC); 
	 
	    $usuario = $linha['usuario_fun']; 
	    $senha = $linha['senha_func']; 
	    
	    $pdo=null;
		 
		if ($usuario == $usuarioFormulario && $senha ==$senhaFormulario){//se a senha e  usuario do banco forem iguais ao digitado começã uma sessao
		 session_start();
		 $_SESSION["Funcionario"]="ok";  
		 echo"<script> alert('Login realizado');</script>";
		 echo"<form method='get' action='InicialFun.php'>";
		 echo "<input	type='text' name='usuario' id='usuario' value='$usuario' hidden>";
		 echo "<input	type='submit' name='entrar' id='entrar' value='' hidden> ";
		 echo"<script>document.getElementById('entrar').click();</script>";
		 echo" </form>";
		 }
	     else{// se senha e  usuario diferentes ao do banco barra acesso
		 echo"<script>alert('Senha ou login inválidos');</script>";
	     echo"<script>window.location='Entrar.html';</script>";
		 }
	}else{// se senha e  usuario vasios
		echo"<script>alert('Senha ou login inválidos');</script>";
		echo"<script>window.location='Entrar.html';</script>";
		}
	}else{

		if($usuarioFormulario!=''||$senhaFormulario!=''){
	    $pdo = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', "root", "");
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $consulta = $pdo->prepare("SELECT * FROM usuario where usuario_usu = :usuario and senha_usu = :senha");
	    $consulta->bindParam(":usuario", $_GET['usuario'], PDO::PARAM_STR);
	    $consulta->bindParam(":senha", $_GET['senha'], PDO::PARAM_STR);

	    $consulta->execute();
	    $linha = $consulta->fetch(PDO::FETCH_ASSOC); 
	 
	    $usuario = $linha['usuario_usu']; 
	    $senha = $linha['senha_usu']; 
	    
	    $pdo=null;
		 
		if ($usuario ==$usuarioFormulario && $senha ==$senhaFormulario){//se a senha e  usuario do banco forem iguais ao digitado começã uma sessao
			session_start();
			$_SESSION["Logado"]="ok";
		 echo"<script> alert('Login realizado');</script>";
		 echo"<form method='get' action='InicialCli.php'>";
		 echo "<input	type='text' name='usuario' id='usuario' value='$usuario' hidden>";
		 echo "<input	type='submit' name='entrar' id='entrar' value='' hidden> ";
		 echo"<script>document.getElementById('entrar').click();</script>";
		 echo" </form>";
		 }
	     else{// se senha e  usuario diferentes ao do banco barra acesso
		 echo"<script>alert('Senha ou login inválidos');</script>";
	     echo"<script>window.location='Entrar.html';</script>";
		 }
		}else{// se senha e  usuario diferentes ao do banco barra acesso
			echo"<script>alert('Senha ou login inválidos');</script>";
			echo"<script>window.location='Entrar.html';</script>";
			}
	}

?>     
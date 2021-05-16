<?php
session_start();
if(isset($_SESSION["Funcionario"])){
    $usuario=$_GET["usuario"];

    $pdo = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $consulta = $pdo->prepare("SELECT * FROM funcionario where usuario_fun = ?");  
    $consulta->execute(array($usuario)); 
    $linha = $consulta->fetch(PDO::FETCH_ASSOC); 
    $nomefun = $linha['nome_fun']; 
  } else{
    echo "<script>alert('Você não tem permissão p/ acessar esta página');</script>";
    echo "<script>window.location='Entrar.html';</script>";
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/formulario2.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.js"></script>    

<style type="text/css">
    * {
padding:0;
margin:0;
vertical-align:baseline;
list-style:none;
border:0
}
    #Pagina{
  margin: 0 auto; /* Altere para o valor da largura desejada. */
  background-color: rgba(252, 252, 252, 0.5);
  /*width: 95%;*/
  padding: 10px;
}
#center{
  margin: 0 auto;
  /*width: 95%;  Altere para o valor da largura desejada. */
}
#conteudo{
  margin: 0 auto;
 /*/* width: 90%;/* Altere para o valor da largura desejada. */
  background-color: white;
}
#dentro{
  margin: 0 auto;
 /* width: 85%; /* Altere para o valor da largura desejada. */
  background-color: white;
}
div{
    margin: 0 auto;
    width: auto;
    padding-left: 5px;
    padding-right: 5px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    padding-bottom: 10px;
}
.col-6{
    margin: 0 0;
}
input{
    margin: 5px;
    margin-bottom: 5px;
}
input[type=text]{
    margin: 10px;
    margin: 0 0;
    margin-bottom: 5px;
}
input[type=password]{
    margin: 10px;
    margin: 0 0;
    margin-bottom: 5px;
}
label{
  margin: 5px;
  margin: 0 0;
  margin-bottom: 2px;
}
#meuform{
    display: none;
    margin: 0 0;
    padding-left: 5px;
    padding-bottom: 5px;
}

body{
    background-image: url("fundo.jpg");
    background-repeat: repeat;
    background-size: cover;
  margin : 0 auto;
  padding: 15%;
  background-attachment: fixed;
  font-family:Didot;
}
h1,h2{
    font-family: Jazz LET;
}
#opc{
  align-items: baseline;
    }

</style>
</head>
<body background="fundo.png">
	<div id="Pagina" class="container">
	    <div id="center">
	    	<div id="Dentro">
		        <div class="TituloForm">
		          <h1 align="center">Bem vindo <?php echo "$nomefun";?></h1>
		        </div>
		        <br><br>
		        <div class="form-row">
		         <div class="TituloForm">
		          <h2 align="center">Central dos problemas: </h2>
                    <div  class="row d-flex justify-content-center" id="x"><!--Botoes-->
                        </form>
                        <form method='get' id="form2" action="lerFunc.php">
                          <input	type='text' name='usuario' id='usuario' <?php echo "value='$usuario'"?> hidden >
		                  <input	type='submit' class="btn btn-dark btn-lg form-btn" name='visualizar' id='visualizar' value='Visualizar'>
                        </form>
					</div>
				  </div>
				</div>
			</div>
		</div>
   </div>
</body>
</html>
<?php
session_start();
if(isset($_SESSION["Logado"])){

  $idusuario=$_GET["usuario"];

    

echo'<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Cadastro de problemas</title>
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
</style>
</head>
<body background="fundo.png">
  <div id="Pagina" class="container">
    <div id="center">
      <div id="Dentro">
        <div   class="TituloForm">
          <h1 align="center">Cadastro de problemas:</h1>
          </div>
         <div class="form-auto">
        <form name="forml" action="CadProb.php" method="GET">

          <div class="form-group">
            <div class="col-sm-10">
              <label class="control-label" for="nome">Descrição</label>
             <input type="text" name="descricao" id="descricao" maxlength="45" required class="form-control" placeholder="Digite a descrição">
            </div>

            <div class="col-sm-10">
              <label class="control-label" for="nome">Digite o detalhamento do problema:</label>
              <textarea required class="form-control" id="observ" name="observ" rows="10" cols="40" style="resize: none">  </textarea>   
            </div>';
           echo" <input	type='text' name='idusuario' id='idusuario'  echo value='$idusuario' hidden>
        </div>";
        

          echo'  <div  class="row d-flex justify-content-center" id="x"><!--Botoes-->
            <input id="bot" class="btn btn-dark btn-lg form-btn" type="submit" value="Enviar">
              
              </form>';

              $pdo = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', "root", "");
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $consulta = $pdo->prepare("SELECT * FROM usuario where idusuario = ?");  
              $consulta->execute(array($idusuario)); 
              $linha = $consulta->fetch(PDO::FETCH_ASSOC); 
              $usuario= $linha['usuario_usu'];
              echo"<form method='get' id='form4' action='InicialCli.php'>
		                  <input type='text' name='usuario' id='usuario' value='$usuario' hidden >
		                  <input type='submit' class='btn btn-dark btn-lg form-btn' name='novo' id='novo' value='Voltar'>
                        </form>";
              

              
           echo' </div>
 
          </div>
        </div>
     
    </div>
  </div>
</div>
</div>
</body>
</html>';
}else{
  echo "<script>alert('Você não tem permissão p/ acessar esta página');</script>";
  echo "<script>window.location='Entrar.html';</script>";
}
?>

    
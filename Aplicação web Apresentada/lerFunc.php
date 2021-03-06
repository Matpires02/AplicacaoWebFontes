<!DOCTYPE html>
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
#requisitado{
    background-color: rgba(130, 190, 232,0.5) ;
    border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    padding-bottom: 5px;
    padding-top:5px;
    margin-top: 5px;
}
#voltar{
    padding-right:10px;
    margin-left: 5px;
    margin-right:10px;
    
}
#form2{
    display: none;
}
#form3{
    display: none;
}

</style>
</head>
<body>
<?php
session_start();
if(isset($_SESSION["Funcionario"])){
        $usuario=$_GET["usuario"];
} else{
    echo "<script>alert('Voc?? n??o tem permiss??o p/ acessar esta p??gina');</script>";
    echo "<script>window.location='Entrar.html';</script>";
}
?>

<?php
$usuario=$_GET["usuario"];
   $pdo = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', "root", "");//'conexao;nome_do_banco;charset',"usuario","senha"
   $sql = "select * from relato";
    echo"<div id='Pagina' class='container'>";
    echo'<div id="center">';
    echo'<div id="Dentro">';
    echo'<div class="TituloForm">';
    echo'<h1 align="center">Visualiza????o de problemas j?? relatados:</h1>
    </div>';
    echo'<div class="form-auto">';
    $cont=1;
   foreach($pdo->query($sql) as $row )//retorna um vetor 
   {
       $descricao=$row["descricao"];
       $observacao=$row["observ"];
        echo"<div id='requisitado' class='col-sm-10'>";
        echo"   <form method='get' id='form1' action='alterar.php'>";
        echo'<h2>Relato '.$cont.'</h2>';
        
            echo"<div class='col-sm-10'>";
            echo"<label>Descri????o:</label>"; 
            echo"<input type='text' name='descricao' id='descricao' value='$descricao' class='form-control' readonly > ";
            echo"</div>";

            echo"<div class='col-sm-10'>";
            echo"<label>Observa????es:</label>";
            echo'<textarea required class="form-control" id="observ" name="observ" rows="10" cols="40" readonly style="resize: none">'.$observacao.' </textarea>';
            echo"</div>";
            echo"</form>";
            echo'</div>';
            $cont++;
            echo'</div>';
   }
   echo"</div>";
   echo"</div>";
   echo"</div>";
   echo' <div  class="row d-flex justify-content-right" id="voltar">';
   echo"<form method='get' id='form4' action='InicialFun.php'>
		                  <input type='text' name='usuario' id='usuario' value='$usuario' hidden >
		                  <input type='submit' class='btn btn-dark btn-lg form-btn' name='novo' id='novo' value='Voltar'>
                        </form>";
   echo'</div>';
   echo"</div>";
   echo"</div>";
   $pdo = null;//fecha a conexao com o banco
  /* else{
       echo "<script>alert('Voc?? n??o tem permiss??o p/ acessar esta p??gina');</script>";
       echo "<script>window.location='Login.html';</script>";
   }
   */

?>
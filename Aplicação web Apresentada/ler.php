<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Visialização de problemas</title>
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
<body >
<?php
session_start();
if(isset($_SESSION["Logado"])){
        $idusuario=$_GET["idusuario"];
        $pdo = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = $pdo->prepare("SELECT * FROM usuario where idusuario = ?");  
        $consulta->execute(array($idusuario)); 
        $linha = $consulta->fetch(PDO::FETCH_ASSOC); 
        $usuario= $linha['usuario_usu'];
} else{
    echo "<script>alert('Você não tem permissão p/ acessar esta página');</script>";
    echo "<script>window.location='Entrar.html';</script>";
}
?>

<?php
$idusuario=$_GET["idusuario"];
   $pdo = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', "root", "");//'conexao;nome_do_banco;charset',"usuario","senha"
   $sql = "select * from relato where usuario_idusuario='$idusuario'";
    echo"<div id='Pagina' class='container'>";
    echo'<div id="center">';
    echo'<div id="Dentro">';
    echo'<div class="TituloForm">';
    echo'<h1 align="center">Visualização de problemas já relatados:</h1>
    </div>';
    echo'<div class="form-auto">';
    $cont=1;
   foreach($pdo->query($sql) as $row )//retorna um vetor 
   {
       $descricao=$row["descricao"];
       $observacao=$row["observ"];
       $idrelato=$row["idrelato"];
        echo"<div id='requisitado' class='col-sm-10'>";
        echo"   <form method='get' id='form1' action='alterar.php'>";
        echo'<h2>Relato '.$cont.'</h2>';
        
            echo"<div class='col-sm-10'>";
            echo"<label>Descrição:</label>"; 
            echo"<input type='text' name='descricao' id='descricao' value='$descricao' class='form-control' readonly > ";
            echo"</div>";

            echo"<div class='col-sm-10'>";
            echo"<label>Observações:</label>";
            echo'<textarea required class="form-control" id="observ" name="observ" rows="10" cols="40" readonly style="resize: none">'.$observacao.' </textarea>';
            echo"</div>";
            echo"<input type='text' name='idrelato' id='idrelato' value='$idrelato' class='form-control' hidden> ";
            echo' <div  class="row d-flex justify-content-center" id="x">';
		    echo" <input type='submit' class='btn btn-dark btn-lg form-btn' name='novo' id='novo' value='Alterar'>";
            echo"</form>";
            echo'<Button id="exclusao" name="exclusao" class="btn btn-dark btn-lg form-btn" type="button" onclick="confirmExclusao()">Excluir</Button>';
            echo'</div>';

            echo"</div>";
            echo'<script>function confirmExclusao() {   
                if (confirm("Tem certeza que deseja excluir essa categoria?")) {
                    document.getElementById("confirm").click();
                }else{
                    document.getElementById("confirm2").click();
                }
            }
                </script>';
            echo"<form method='get' id='form2' action='deletar.php'>";
            echo"<input type='text' name='idrelato' id='idrelato' value='$idrelato' class='form-control' hidden> ";
            echo"<input type='text' name='idusuario' id='idusuario' value='$idusuario' class='form-control' hidden> ";
            echo' <div  class="row d-flex justify-content-center" id="x">';
		    echo" <input type='submit' class='btn btn-dark btn-lg form-btn' name='confirm' id='confirm' value=''>";
            echo"</form>";
            echo'</div>';
            echo"<form method='get' id='form3' action='ler.php'>";
            echo"<input type='text' name='idusuario' id='idusuario' value='$idusuario' class='form-control' hidden> ";
            echo' <div  class="row d-flex justify-content-center" id="x">';
		    echo" <input type='submit' class='btn btn-dark btn-lg form-btn' name='confirm2' id='confirm2' value=''>";
            echo"</form>";
            echo'</div>';
            $cont++;
            echo'</div>';
   }
   echo"</div>";
   echo"</div>";
   echo"</div>";
   echo' <div  class="row d-flex justify-content-right" id="voltar">';
   echo"<form method='get' id='form4' action='InicialCli.php'>
		                  <input type='text' name='usuario' id='usuario' value='$usuario' hidden >
		                  <input type='submit' class='btn btn-dark btn-lg form-btn' name='novo' id='novo' value='Voltar'>
                        </form>";
   echo'</div>';
   echo"</div>";
   echo"</div>";
   $pdo = null;//fecha a conexao com o banco
  /* else{
       echo "<script>alert('Você não tem permissão p/ acessar esta página');</script>";
       echo "<script>window.location='Login.html';</script>";
   }
   */

?>
<?php
$_SESSION["Funcionario"]=null;
$_SESSION["Logado"]=null;
session_destroy();
echo "<script> window.location='Entrar.html';</script>";
?>
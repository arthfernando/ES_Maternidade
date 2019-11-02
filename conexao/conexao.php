<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "maternidade";

$conecta = mysqli_connect($servidor,$usuario, $senha, $banco);

if( mysqli_connect_errno() ) {
    die("Conexão com o banco falhou " . mysqli_close_errno());
}

?>
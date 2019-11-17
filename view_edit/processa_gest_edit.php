<?php
session_start();
include_once("conexao.php");

$cpf = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_NUMBER_INT);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);

$result_gest = "UPDATE gestante SET cpf='" . $cpf . "', nome='" . $nome ."' , data='". $data ."', telefone='". $telefone ."', modified=NOW() WHERE cpf='$cpf'";
print($result_gest);

$resultado_gestante = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: tab_gest.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: tab_gest.php?id=$id");
}
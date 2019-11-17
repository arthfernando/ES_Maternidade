<?php

function MyAutoLoad($className) {
    $extension = spl_autoload_extensions();
    require_once('classes/' . $className . $extension);
}

spl_autoload_extensions('.class.php');
spl_autoload_register('MyAutoload');

$conn = Connection::getInstance();

if(!$conn) {
    die("Conexao falhou.");
    
} else {
    $cpf = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_NUMBER_INT);
    $result_gest = "SELECT * FROM gestante WHERE cpf = '$cpf'";
    $resultado_gestante = mysqli_query($conn, $result_gest);
    $row_gestante = mysqli_fetch_assoc($resultado_gestante);
}
    
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Gestante - Editar</title>		
	</head>
	<body>
		<a href="index.php">Voltar</a><br>
		<h1>Editar Gestante</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="processa_gest_edit.php">
			
            <label>CPF: </label>
			<input type="number" name="cpf" value="<?php echo $row_gestante['cpf']; ?>"><br><br>
            
			<label>Nome: </label>
			<input type="text" name="nome" value="<?php echo $row_gestante['nome']; ?>"><br><br>
			
             <label>Data de Nascimento: </label>
			<input type="date" name="data" value="<?php echo $row_gestante['data']; ?>"><br><br>
            
			<label>Telefone para Contato: </label>
			<input type="number" name="telefone" value="<?php echo $row_gestante['telefone']; ?>"><br><br>

            
			<input type="submit" value="Editar">
		</form>
	</body>
</html>
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
    $sql = "SELECT * FROM gestante";
    $result = mysqli_query($conn, $sql);

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Informações: Gestante</title>
    </head>

    <body>
    <a href="index.php">Voltar</a><br><br>
        <main>
        <?php
            if($result->num_rows > 0) {
                
        ?>
        <table style="width:50%">
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Telefone</th>
                <th>CRM Médico</th>
            </tr>
                <?php
                    while($row = $result->fetch_assoc()) {
                ?>
            <tr>
                <td>
                    <?php echo $row["cpf"]; ?>
                </td>
                <td>
                    <?php echo $row["nome"]; ?>
                </td>
                <td>
                    <?php echo $row["data_nasc"]; ?>
                </td>
                <td>
                    <?php echo $row["telefone"]; ?>
                </td>
                <td>
                    <?php echo $row["crm_medico"]; ?>
                </td>
            </tr>
            <?php
                    }
                }
            }
            ?>
        </table>
        </main>
        <a href="index.php">Voltar</a><br><br>
    </body>
</html>
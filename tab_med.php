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
    $sql = "SELECT * FROM medico";
    $result = mysqli_query($conn, $sql);
    
    // if($result->num_rows > 0) {
    //     while($row = $result->fetch_assoc()) {
    //         echo "CRM: " . $row["crm"] . " - Nome: " . $row["nome"] . "<br>";
    //     }
    // } else {
    //     echo "Nenhum resultado.";
    // }
// }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Informações: Médico</title>
    </head>

    <body>
    <a href="index.php">Voltar</a><br><br>
        <main>
        <?php
            if($result->num_rows > 0) {
                
        ?>
        <table style="width:50%">
            <tr>
                <th>CRM</th>
                <th>Nome</th>
            </tr>
                <?php
                    while($row = $result->fetch_assoc()) {
                ?>
            <tr>
                <td>
                    <?php echo $row["crm"]; ?>
                </td>
                <td>
                    <?php echo $row["nome"]; ?>
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
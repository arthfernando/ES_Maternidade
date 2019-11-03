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
    $sql = "SELECT * FROM bercario";
    $result = mysqli_query($conn, $sql);

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Informações: Berçário</title>
    </head>

    <body>
    <a href="index.php">Voltar</a><br><br>
        <main>
        <?php
            if($result->num_rows > 0) {
                
        ?>
        <table style="width:50%">
            <tr>
                <th>Número do Berçario</th>
                <th>Número do Berço</th>
            </tr>
                <?php
                    while($row = $result->fetch_assoc()) {
                ?>
            <tr>
                <td>
                    <?php echo $row["num_bercario"]; ?>
                </td>
                <td>
                    <?php echo $row["num_berco"]; ?>
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
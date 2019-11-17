<?php

function MyAutoLoad($className) {
    $extension = spl_autoload_extensions();
    require_once('../classes/' . $className . $extension);
}

spl_autoload_extensions('.class.php');
spl_autoload_register('MyAutoload');

$conn = Connection::getInstance();

if(!$conn) {
    die("Conexao falhou.");
} else {
    $sql = "SELECT * FROM medico";
    $result = pg_query($conn, $sql);
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Informações: Médico</title>
        <link rel="stylesheet" type="text/css" href="/Style/style.css">
    </head>

    <body>
        <main>
        <h4 class="index2">Maternidade - Médico</h4>
        <a class="back" href="../index.php">Voltar</a><br><br><br><br>
        <?php
            if(pg_num_rows($result) > 0) {
        ?>
        <table class="visu_acom6">
            <tr>
                <th class="acom6">CRM</th>
                <th class="acom6">Nome</th>
            </tr>
                <?php
                    while($row = pg_fetch_assoc($result)) {
                ?>
            <tr>
                <td class="acom6">
                    <?php echo $row["crm"]; ?>
                </td>
                <td class="acom6">
                    <?php echo $row["nome"]; ?>
                </td>
            </tr>
            <?php
                    }
                } else {
            ?>
                <h2>Nenhum resultado encontrado</h2>
            <?php
                }
            }
            ?>
        </table>
        </main>
    </body>
</html>
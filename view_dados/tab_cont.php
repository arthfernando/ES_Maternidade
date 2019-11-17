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
    $sql = "SELECT * FROM contato";
    $result = pg_query($conn, $sql);

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Informações: Contato Gestante</title>
        <link rel="stylesheet" type="text/css" href="/Style/style.css">
    </head>

    <body>
        <main>
        <h4 class="index2">Maternidade - Contato Gestante</h4>
        <a class="back" href="../index.php">Voltar</a><br><br><br><br>
        <?php
            if(pg_num_rows($result) > 0) {
        ?>
        <table class="visu_acom4">
            <tr>
                <th class="acom4">Telefone</th>
                <th class="acom4">CPF Gestante</th>
                <th class="acom4">CPF Acompanhante</th>
            </tr>
                <?php
                    while($row = pg_fetch_assoc($result)) {
                ?>
            <tr>
                <td class="acom4">
                    <?php echo $row["telefone"]; ?>
                </td>
                <td class="acom4">
                    <?php echo $row["cpf_gestante"]; ?>
                </td>
                <td class="acom4">
                    <?php echo $row["cpf_pessoa"]; ?>
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
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
    $sql = "SELECT * FROM pessoa";
    $result = pg_query($conn, $sql);
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Informações: Acompanhante</title>
        <link rel="stylesheet" type="text/css" href="/Style/style.css">
    </head>

    <body>
        <main>
        <h4 class="index2">Maternidade - Acompanhante</h4>
        <a class="back" href="../index.php">Voltar</a><br><br><br><br>
        <?php
            if(pg_num_rows($result) > 0) {
        ?>
        <table class="visu_acom">
            <tr>
                <th class="acom">CPF</th>
                <th class="acom">Nome</th>
                <th class="acom">Parentesco</th>
                <th class="acom">Data de Nascimento</th>
                <th class="acom">CPF Gestante</th>
            </tr>
                <?php
                    while($row = pg_fetch_assoc($result)) {
                ?>
            <tr>
                <td class="acom">
                    <?php echo $row["cpf"]; ?>
                </td>
                <td class="acom">
                    <?php echo $row["nome"]; ?>
                </td>
                <td class="acom">
                    <?php echo $row["parentesco"]; ?>
                </td>
                <td class="acom">
                    <?php echo $row["data_nasc"]; ?>
                </td>
                <td class="acom">
                    <?php echo $row["cpf_gestante"]; ?>
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
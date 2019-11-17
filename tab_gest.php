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
    $result = pg_query($conn, $sql);

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Informações: Gestante</title>
        <link rel="stylesheet" type="text/css" href="Style/style.css">
    </head>

    <body>
        <main>
        <h4 class="index2">Maternidade - Gestante</h4>
        <a class="back" href="index.php">Voltar</a><br><br><br><br>
        <?php
            if(pg_num_rows($result) > 0) {
        ?>
        <table class="visu_acom5">
            <tr>
                <th class="acom5">CPF</th>
                <th class="acom5">Nome</th>
                <th class="acom5">Data de Nascimento</th>
                <th class="acom5">Telefone</th>
                <th class="acom5">CRM Médico</th>
            </tr>
                <?php
                   while($row = pg_fetch_assoc($result)) {
                ?>
            <tr>
                <td class="acom5">
                    <?php echo $row["cpf"]; ?>
                </td>
                <td class="acom5">
                    <?php echo $row["nome"]; ?>
                </td>
                <td class="acom5">
                    <?php echo $row["data_nasc"]; ?>
                </td>
                <td class="acom5">
                    <?php echo $row["telefone"]; ?>
                </td class="acom5">
                <td class="acom5">
                    <?php echo $row["crm_medico"]; ?>
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
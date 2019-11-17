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
    $sql = "SELECT * FROM bebe";
    $result = pg_query($conn, $sql);

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Informações: Recém Nascido</title>
        <link rel="stylesheet" type="text/css" href="/Style/style.css">
    </head>

    <body>
        <main>
        <h4 class="index2">Maternidade - Recém Nascido</h4>
        <a class="back" href="../index.php">Voltar</a><br><br><br><br>
        <?php
            if(pg_num_rows($result) > 0) {
        ?>
        <table class="visu_acom2">
            <tr>
                <th class="acom2">Nº Registro</th>
                <th class="acom2">Nome</th>
                <th class="acom2">Peso</th>
                <th class="acom2">Sexo</th>
                <th class="acom2">Altura</th>
                <th class="acom2">Data de Nascimento</th>
                <th class="acom2">Hora de Nascimento</th>
                <th class="acom2">Tipo do Parto</th>
                <th class="acom2">CPF Gestante</th>
                <th class="acom2">Nº Berçário</th>
            </tr>
                <?php
                    while($row = pg_fetch_assoc($result)) {
                ?>
            <tr>
                <td class="acom2">
                    <?php echo $row["reg_bebe"]; ?>
                </td>
                <td class="acom2">
                    <?php echo $row["nome"]; ?>
                </td>
                <td class="acom2">
                    <?php echo $row["peso"]; ?>
                </td>
                <td class="acom2">
                    <?php 
                        if($row["sexo"] == 0) {
                            echo "Masculino";
                        } else {
                            echo "Feminino";
                        }
                    ?>
                </td>
                <td class="acom2">
                    <?php echo $row["altura"]; ?>
                </td>
                <td class="acom2">
                    <?php echo $row["data_nasc"]; ?>
                </td>
                <td class="acom2">
                    <?php echo $row["hora_nasc"]; ?>
                </td>
                <td class="acom2">
                    <?php 
                        if($row["tipo_parto"] == 0) {
                            echo "Normal";
                        } else {
                            echo "Cesárea";
                        }
                    ?>
                </td>
                <td class="acom2">
                    <?php echo $row["cpf_gestante"]; ?>
                </td>
                <td class="acom2">
                    <?php echo $row["num_bercario"]; ?>
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
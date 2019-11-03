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
    $sql = "SELECT * FROM bebe";
    $result = mysqli_query($conn, $sql);

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Informações: Recém Nascido</title>
    </head>

    <body>
    <a href="index.php">Voltar</a><br><br>
        <main>
        <?php
            if($result->num_rows > 0) {
                
        ?>
        <table style="width:80%">
            <tr>
                <th>Nº Registro</th>
                <th>Nome</th>
                <th>Peso</th>
                <th>Sexo</th>
                <th>Altura</th>
                <th>Data de Nascimento</th>
                <th>Hora de Nascimento</th>
                <th>Tipo do Parto</th>
                <th>CPF Gestante</th>
                <th>Nº Berçário</th>
            </tr>
                <?php
                    while($row = $result->fetch_assoc()) {
                ?>
            <tr>
                <td>
                    <?php echo $row["reg_bebe"]; ?>
                </td>
                <td>
                    <?php echo $row["nome"]; ?>
                </td>
                <td>
                    <?php echo $row["peso"]; ?>
                </td>
                <td>
                    <?php 
                        if($row["sexo"] == 0) {
                            echo "Masculino";
                        } else {
                            echo "Feminino";
                        }
                    ?>
                </td>
                <td>
                    <?php echo $row["altura"]; ?>
                </td>
                <td>
                    <?php echo $row["data_nasc"]; ?>
                </td>
                <td>
                    <?php echo $row["hora_nasc"]; ?>
                </td>
                <td>
                    <?php 
                        if($row["tipo_parto"] == 0) {
                            echo "Normal";
                        } else {
                            echo "Cesárea";
                        }
                    ?>
                </td>
                <td>
                    <?php echo $row["cpf_gestante"]; ?>
                </td>
                <td>
                    <?php echo $row["num_bercario"]; ?>
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
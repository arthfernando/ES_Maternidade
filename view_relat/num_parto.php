<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Número de Partos Cesarianos</title>
        <link rel="stylesheet" type="text/css" href="/Style/style.css">
    </head>

    <body>
        <main>
        <h4 class="index2">Maternidade - Número de Partos Cesarianos</h4>
        <a class="back" href="../index.php">Voltar</a><br><br>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
                <h4 class="enter">Entre com a data incial</h4>
                <input type="date" name="parto_ini"  class="parto" required>
                <h4 class="enter">Entre com a data final</h4>
                <input type="date" name="parto_fim"  class="parto" required>
                <br><br><br>
                <input type="submit" name="enviar" class="search" value="Pesquisar">
                <br><br><br>
                
            </form>
        </main>
    </body>
</html>

<?php

$msg = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    function MyAutoLoad($className) {
        $extension = spl_autoload_extensions();
        require_once('../classes/' . $className . $extension);
    }

    spl_autoload_extensions('.class.php');
    spl_autoload_register('MyAutoLoad');

    $partoini = $_POST["parto_ini"];
    $partofim = $_POST["parto_fim"];

    $form_result= $_POST['enviar'];
    $conn = Connection::getInstance();

    if (isset($form_result)){
        if(!$conn) {
            die("Conexao falhou.");
        } 
        else {
            $sql = "SELECT count(tipo_parto) FROM bebe WHERE tipo_parto = true and (data_nasc > '" . $partoini . "' AND data_nasc < '". $partofim ."')";
            $result = pg_query($conn, $sql);
                if(pg_num_rows($result) > 0) {
                    echo "<h4 class='acom6'>Quantidade de partos cesarianos: </h4>";
                    echo "<br><br>";
                    while($row = pg_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td class='acom6'>". $row['count']. "</td>";
                        echo "</tr>";
                    }
                }
            } 
        }
        echo "</table>";
        echo "</div>";
        }
?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Número de Recém Nascidos</title>
        <link rel="stylesheet" type="text/css" href="/Style/style.css">
    </head>

    <body>
        <main>
        <h4 class="index2">Maternidade - Número de Recém Nascidos</h4>
        <a class="back" href="../index.php">Voltar</a><br><br>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
                <h4 class="enter">Entre com a data desejada</h4>
                <input type="date" name="nasc_diario"  class="parto" required>
            <br><br><br>
            <input type="submit" name="enviar" class="search" value="Pesquisar">
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

    $data = $_POST["nasc_diario"];

    $form_result= $_POST['enviar'];
    $conn = Connection::getInstance();
    
    if (isset($form_result)){
        if(!$conn) {
            die("Conexao falhou.");
        } 
        else {
            $sql = "SELECT count(data_nasc) FROM bebe WHERE data_nasc = '" . $data . "'";
            $result = pg_query($conn, $sql);
                if(pg_num_rows($result) > 0) {
                    echo "<h4 class='acom6'>Quantidade de recém nascidos: </h4>";
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



<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pesquisar Berçário</title>
        <link rel="stylesheet" type="text/css" href="/Style/style.css">
    </head>

    <body>
        <main>
        <h4 class="index2">Maternidade - Pesquisar Berçário</h4>
        <a class="back" href="../index.php">Voltar</a><br><br>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
                <h4 class="enter">Entre com o Registro do recém nascido</h4>
                <input type="text" name="reg_bebe" class="enter2" placeholder="Registro" required>
            <br><br><br>
            <input type="submit" name="enviar" class="search" value="Pesquisar">
            <br><br>
                
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

    $regbebe = $_POST["reg_bebe"];

    $form_result= $_POST['enviar'];
    $conn = Connection::getInstance();
    
    if (isset($form_result)){
        if (is_numeric($regbebe)&&(strlen($regbebe) == 6)) {
            if(!$conn) {
                die("Conexao falhou.");
            } 
            else {
                $sql = "SELECT b.nome, b.num_bercario, ber.num_berco FROM bebe b INNER JOIN bercario ber ON b.reg_bebe = '" . $regbebe . "' AND b.num_bercario = ber.num_bercario";
                $result = pg_query($conn, $sql);
                if(pg_num_rows($result) > 0) {
                    echo "<div id='baixo'>";
                    echo  "<table class='visu_acom6'>";
                    echo   "<tr>";
                    echo "<th class='acom6'>Nome</th>";
                    echo "<th class='acom6'>Berçário</th>";
                    echo "<th class='acom6'>Berço</th>";
                    echo "</tr>";
                    while($row = pg_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td class='acom6'>". $row['nome'] ."</td>";
                        echo "<td class='acom6'>". $row['num_bercario']. "</td>";
                        echo "<td class='acom6'>". $row['num_berco']. "</td>";
                        echo "</tr>";
                    }
                } 
                else {
                    echo "<h2>Nenhum resultado encontrado</h2>";
                }
            }
            echo "</table>";
            echo "</div>";
            }
        }
        else {
            $message = "wrong answer";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
?>


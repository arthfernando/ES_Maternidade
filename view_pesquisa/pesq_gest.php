<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pesquisar Gestante</title>
        <link rel="stylesheet" type="text/css" href="/Style/style.css">
    </head>

    <body>
        <main>
            <h4 class="index2">Maternidade - Pesquisar Gestante</h4>
            <a class="back" href="../index.php">Voltar</a><br><br>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
                <h4 class="enter">Entre com o CPF da Gestante</h4>
                <input type="text" name="cpf_gestante" class="enter2" placeholder="CPF" required>
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

    $cpfgest = $_POST["cpf_gestante"];

    $form_result= $_POST['enviar'];
    $conn = Connection::getInstance();
    
    if (isset($form_result)){
        if (is_numeric($cpfgest)&&(strlen($cpfgest) == 11)) {
            if(!$conn) {
                die("Conexao falhou.");
            } else {
                $sql = "SELECT cpf, nome FROM gestante WHERE cpf = '" . $cpfgest . "'";
                $result = pg_query($conn, $sql);
                if(pg_num_rows($result) > 0) {
                    echo "<div id='baixo'>";
                    echo  "<table class='visu_acom6'>";
                    echo   "<tr>";
                    echo "<th class='acom6'>CPF</th>";
                    echo "<th class='acom6'>Nome</th>";
                    echo "</tr>";
                    while($row = pg_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td class='acom6'>". $row['cpf'] ."</td>";
                        echo "<td class='acom6'>". $row['nome']. "</td>";
                        echo "</tr>";
                    }
                } else {
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



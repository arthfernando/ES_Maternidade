<?php

$msg = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    function MyAutoLoad($className) {
        $extension = spl_autoload_extensions();
        require_once('classes/' . $className . $extension);
    }

    spl_autoload_extensions('.class.php');
    spl_autoload_register('MyAutoLoad');

    $contparto = $_POST["cont_parto"];

    //$med = new Medico($crm);
    //$msg = $med->save();

    $form_result= $_POST['enviar'];
    
    if (isset($form_result)){
        if (is_numeric($regbebe)&&(strlen($regbebe) == 6)) {
            $message = "Success";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else {
            $message = "wrong answer";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

    }

}

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Número de Partos Cesarianos</title>
        <link rel="stylesheet" type="text/css" href="Style/style.css">
    </head>

    <body>
        <main>
        <h4 class="index2">Maternidade - Número de Partos Cesarianos</h4>
        <a class="back" href="index.php">Voltar</a><br><br>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
                <h4 class="enter">Entre com a data incial</h4>
                <input type="date" name="cont_parto"  class="parto" required>
                <h4 class="enter">Entre com a data final</h4>
                <input type="date" name="cont_parto"  class="parto" required>
                <br><br><br>
                <input type="submit" name="enviar" class="search" value="Pesquisar">
                <br><br><br>
                <span class="message2"><?php echo "Número de partos cesarianos: 850"; ?></span>
                
            </form>
        </main>
    </body>
</html>

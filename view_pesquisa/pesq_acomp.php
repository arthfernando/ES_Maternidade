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
    $cpfacomp = $_POST["cpf_acomp"];

    //$gest = new Gestante($cpfgest);
    //$msg = $gest->save();

    $form_result= $_POST['enviar'];
    
    if (isset($form_result)){
        if((is_numeric($cpfgest)&&(strlen($cpfgest) == 11))&&(is_numeric($cpfacomp)&&(strlen($cpfacomp) == 11))) {
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
        <title>Pesquisar Acompanhante</title>
        <link rel="stylesheet" type="text/css" href="/Style/style.css">
    </head>

    <body>
        <main>
            <h4 class="index2">Maternidade - Pesquisar Acompanhante</h4>
            <a class="back" href="../index.php">Voltar</a><br><br>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
                <h4 class="enter">Entre com o CPF da Gestante</h4>
                <input type="text" name="cpf_gestante" class="enter2" placeholder="CPF" required>
            <br>
                <h4 class="enter">Entre com o CPF do Acompanhante</h4>
                <input type="text" name="cpf_acomp" class="enter2" placeholder="CPF" required>
            <br><br><br>
            <input type="submit" name="enviar" class="search" value="Pesquisar">
            <br><br>
                
            </form>
        </main>
    </body>
</html>

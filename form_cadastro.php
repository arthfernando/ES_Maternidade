<?php

$msg1 = "";
$msg2 = "";
$msg3 = "";
$msg4 = "";
$msg5 = "";
$msg6 = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    function MyAutoLoad($className) {
        $extension = spl_autoload_extensions();
        require_once('classes/' . $className . $extension);
    }

    spl_autoload_extensions('.class.php');
    spl_autoload_register('MyAutoLoad');

    $nomemed = $_POST["nome_medico"];
    $crm = $_POST["crm_medico"];

    $nomegest = $_POST["nome_gestante"];
    $cpfgest = $_POST["cpf_gestante"];
    $datagest = $_POST["nasc_gestante"];
    $telegest = $_POST["telefone"];

    // $nomeacomp = $_POST["nome_acomp"];
    // $cpfacomp = $_POST["cpf_acomp"];
    // $dataacomp = $_POST["nasc_acomp"];
    // $parentesco = $_POST["parentesco"];

    // $nomebebe = $_POST["nome_bebe"];
    // $pesobebe = $_POST["peso_bebe"];
    // $alturabebe = $_POST["altura_bebe"];
    // $sexo_bebe = $_POST["sexo_bebe"];
    // $nasc_bebe = $_POST["nasc_bebe"];
    // $hora_bebe = $_POST["hora_bebe"];
    // $tipo_parto = $_POST["tipo_parto"];

    // $numbercario = $_POST["num_bercario"];
    // $numberco = $_POST["num_berco"];

    $med = new Medico($crm, $nomemed);
    $gest = new Gestante($cpfgest, $nomegest, $datagest, $telegest, $crm);
    $pessoa = new Pessoa($nomeacomp, $cpfacomp, $dataacomp, $parentesco, $cpfgest);
    $contato = new Contato($telegest, $cpfgest, $cpfacomp);
    $bercario = new Bercario($numbercario, $numberco);
    $bebe = new Bebe($nomebebe, $pesobebe, $alturabebe, $sexo_bebe, $nasc_bebe, $hora_bebe, $tipo_parto, $cpfgest, $numbercario);

    if($med->check() && $gest->check() && $pessoa->check() && $contato->check() && $bercario->check()) {
        $msg1 = $med->save();
        $msg2 = $gest->save();
        $msg3 = $pessoa->save();
        $msg4 = $contato->save();
        $msg5 = $bercario->save();
        $msg6 = $bebe->save();
    } else {
        $msg1 = $med->getError();
        $msg2 = $gest->getError();
        $msg3 = $pessoa->getError();
        $msg4 = $contato->getError();
        $msg5 = $bercario->getError();
        $msg6 = $bebe->getError();
    }


}

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Paciente</title>
        <link rel="stylesheet" type="text/css" href="Style/style.css">
    </head>

    <body>
        <main>
        <h4 class="index2">Maternidade - Cadastro de Paciente</h4>
        <a class="back" href="index.php">Voltar</a><br><br>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">

            <h3><?php if ($msg1 != "") echo $msg1 ?>
            <h3><?php if ($msg2 != "") echo $msg2 ?>
            <h3><?php if ($msg3 != "") echo $msg3 ?>
            <h3><?php if ($msg4 != "") echo $msg4 ?>
            <h3><?php if ($msg5 != "") echo $msg5 ?>
            <h3><?php if ($msg6 != "") echo $msg6 ?>

            <h2 class="enter3">Dados do Médico Responsável</h2>
                <h4 class="enter">Nome do Médico:</h4>
                <input type="text" name="nome_medico" class="enter2"  placeholder="Nome do Médico" required>
                <h4 class="enter">Nº do CRM:</h4>
                <input type="text" name="crm_medico"  class="enter2" placeholder="CRM" required>

            <h2 class="enter3">Dados do Paciente</h2>
                <h4 class="enter">Nome do Paciente:</h4>
                <input type="text" name="nome_gestante" class="enter2" placeholder="Nome Completo" required>
                <h4 class="enter">CPF do Paciente:</h4>
                <input type="text" name="cpf_gestante" class="enter2"  placeholder="CPF" required>
                <h4 class="enter">Data de Nascimento:</h4>
                <input type="date" name="nasc_gestante" class="enter2"  required>
                <h4 class="enter">Telefone para Contato:</h4>
                <input type="text" name="telefone"  class="enter2" placeholder="DDDXXXXXXXX" pattern="[0-9]{11}" required>

            <h2 class="enter3">Dados do Acompanhante</h2>
                <h4 class="enter">Nome do Acompanhante:</h4>
                <input type="text" name="nome_acomp" class="enter2"  placeholder="Nome Completo" required>
                <h4 class="enter">CPF do Acompanhante:</h4>
                <input type="text" name="cpf_acomp"  class="enter2" placeholder="CPF" required>
                <h4 class="enter">Data de Nascimento:</h4>
                <input type="date" name="nasc_acomp" class="enter2"required>
                <h4 class="enter">Relação de Parentesco:</h4>
                <input type="text" name="parentesco"  class="enter2" placeholder="Parentesco" required>


            <h2 class="enter3">Dados do Recém Nascido </h2>
                <h4 class="enter">Nome do Recém Nascido:</h4>
                <input type="text" name="nome_bebe"  class="enter2" placeholder="Nome Completo" required>
                <h4 class="enter">Peso:</h4>
                <input type="number" name="peso_bebe"  class="enter2" placeholder="(em Kg)" step="0.1" required>
                <h4 class="enter">Altura:</h4>
                <input type="number" name="altura_bebe"  class="enter2" placeholder="(em cm)" step="0.1" required>
                <h4 class="enter">Sexo:</h4>
                <select name="sexo_bebe"  class="enter2" required>
                    <option value="" disabled selected> --Selecione-- </option>
                    <option value="0"> Masculino </option>
                    <option value="1"> Feminino </option>
                </select>
                <h4 class="enter">Data de Nascimento:</h4>
                <input type="date" name="nasc_bebe" class="enter2"  required>
                <h4 class="enter">Hora de Nascimento:</h4>
                <input type="time" name="hora_bebe" class="enter2"  required>
                <h4 class="enter">Tipo de Parto:</h4>
                <select name="tipo_parto"  class="enter2" required>
                    <option value="" disabled selected> --Selecione-- </option>
                    <option value="0"> Normal </option>
                    <option value="1"> Cesárea </option>
                </select>
                <h4 class="enter">Nº Berçário:</h4>
                <input type="number" name="num_bercario" class="enter2"  required>
                <h4 class="enter">Nº Berço:</h4>
                <input type="number" name="num_berco"  class="enter2" required>
                
            <br><br><br>
            <input type="submit" name="enviar"  class="search" value="Cadastrar">
            <br><br>
                
            </form>
        </main>
        <a class="back" href="index.php">Voltar</a><br><br>
    </body>
</html>

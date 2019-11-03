<?php

$msg = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    function MyAutoLoad($className) {
        $extension = spl_autoload_extensions();
        require_once('classes/' . $className . $extension);
    }

    spl_autoload_extensions('.class.php');
    spl_autoload_register('MyAutoLoad');

    $nomegest = $_POST["nome_gestante"];
    $cpfgest = $_POST["cpf_gestante"];
    $datagest = $_POST["nasc_gestante"];
    $telegest = $_POST["telefone"];

    $nomemed = $_POST["nome_medico"];
    $crm = $_POST["crm_medico"];

    $nomeacomp = $_POST["nome_acomp"];
    $cpfacomp = $_POST["cpf_acomp"];
    $dataacomp = $_POST["nasc_acomp"];
    $parentesco = $_POST["parentesco"];

    $nomebebe = $_POST["nome_bebe"];
    $pesobebe = $_POST["peso_bebe"];
    $alturabebe = $_POST["altura_bebe"];
    $sexo_bebe = $_POST["sexo_bebe"];
    $nasc_bebe = $_POST["nasc_bebe"];
    $hora_bebe = $_POST["hora_bebe"];
    $tipo_parto = $_POST["tipo_parto"];

    $med = new Medico($crm, $nomemed);
    $msg = $med->save();
    
    $gest = new Gestante($cpfgest, $nomegest, $datagest, $telegest, $crm);
    $msg = $gest->save();

    $pessoa = new Pessoa($nomeacomp, $cpfacomp, $dataacomp, $parentesco);
    $msg = $pessoa->save();

    $bercario = new Bercario($numbercario, $numberco);
    $msg = $bercario->save();

    $bebe = new Bebe($nomebebe, $pesobebe, $alturabebe, $sexo_bebe, $nasc_bebe, $hora_bebe, $tipo_parto);
    $msg = $bebe->save();

    $contato = new Contato($telegest, $cpfacomp, $cpfacomp);
    $msg = $contato->save();

}

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Paciente</title>
    </head>

    <body>
        <main>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
            <h2> - Dados do Paciente</h2>
                <h4>Nome do Paciente:</h4>
                <input type="text" name="nome_gestante" placeholder="Nome Completo" required>
                <h4>CPF do Paciente:</h4>
                <input type="text" name="cpf_gestante" placeholder="CPF" required>
                <h4>Data de Nascimento:</h4>
                <input type="date" name="nasc_gestante" required>
                <h4>Telefone para Contato:</h4>
                <input type="text" name="telefone" placeholder="DDD-XXXXXXXX" pattern="[0-9]{11}" required>

            <h2> - Dados do Acompanhante</h2>
                <h4>Nome do Acompanhante:</h4>
                <input type="text" name="nome_acomp" placeholder="Nome Completo" required>
                <h4>CPF do Acompanhante:</h4>
                <input type="text" name="cpf_acomp" placeholder="CPF" required>
                <h4>Data de Nascimento:</h4>
                <input type="date" name="nasc_acomp" required>
                <h4>Relação de Parentesco:</h4>
                <input type="text" name="parentesco" placeholder="Parentesco" required>

            <h2> - Dados do Médico Responsável</h2>
                <h4>Nome do Médico:</h4>
                <input type="text" name="nome_medico" placeholder="Nome do Médico" required>
                <h4>Nº do CRM:</h4>
                <input type="text" name="crm_medico" placeholder="CRM" required>
            
            <h2> - Dados do Recém Nascido </h2>
                <h4>Nome do Recém Nascido:</h4>
                <input type="text" name="nome_bebe" placeholder="Nome Completo" required>
                <h4>Peso:</h4>
                <input type="number" name="peso_bebe" placeholder="(em Kg)" step="0.1" required>
                <h4>Altura:</h4>
                <input type="number" name="altura_bebe" placeholder="(em cm)" step="0.1" required>
                <h4>Sexo:</h4>
                <select name="sexo_bebe" required>
                    <option value="" disabled selected> --Selecione-- </option>
                    <option value="0"> Masculino </option>
                    <option value="1"> Feminino </option>
                </select>
                <h4>Data de Nascimento:</h4>
                <input type="date" name="nasc_bebe" required>
                <h4>Hora de Nascimento:</h4>
                <input type="time" name="hora_bebe" required>
                <h4>Tipo de Parto:</h4>
                <select name="tipo_parto" required>
                    <option value="" disabled selected> --Selecione-- </option>
                    <option value="0"> Normal </option>
                    <option value="1"> Cesárea </option>
                </select>
                <h4>Nº Berçário:</h4>
                <input type="number" name="num_bercario" required>
                <h4>Nº Berço:</h4>
                <input type="number" name="num_berco" required>
                
            <br><br><br>
            <input type="submit" name="enviar" value="Cadastrar">

            <label for="msg">Mensagem:<font color="#AA0000"><?php echo $msg; ?></font>
                
            </form>
        </main>
    </body>
</html>

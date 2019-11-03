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

    $crm = $_POST["crm_medico"];

    $gest = new Gestante($cpfgest, $nomegest, $datagest, $telegest, $crm);
    $msg = $gest->save();
/*    $nomeacomp = $_POST["nome_acomp"];
    $cpfacomp = $_POST["cpf_acomp"];
    $dataacomp = $_POST["nasc_acomp"];
    $parentesco = $_POST["parentesco"];

    $nomemed = $_POST["nome_medico"];

    $regbebe = $_POST["reg_bebe"];
    $nomebebe = $_POST["nome_bebe"];
    $pesobebe = $_POST["peso_bebe"];
    $alturabebe = $_POST["altura_bebe"];
    $sexo_bebe = $_POST["sexo_bebe"];
    $nasc_bebe = $_POST["nasc_bebe"];
    $hora_bebe = $_POST["hora_bebe"];
    $tipo_parto = $_POST["tipo_parto"];

    $numbercario = $_POST["num_bercario"];
    $numberco = $_POST["num_berco"];

    
    if(!$conecta) {
        $msg = "Falha na conexão";
        return $msg;
    } else {

        

        $sql_pessoa = "INSERT INTO pessoa (cpf, nome, parentesco, data_nasc, cpf_gestante) VALUES ('" . $cpfacomp . "','" . $nomeacomp . "','" . $parentesco . "','" . $dataacomp . "','" . $cpfgest . "')";

        $sql_med = "INSERT INTO gestante (crm, nome) VALUES ('" . $crm . "','" . $nomemed . "')";

        $sql_bebe = "INSERT INTO gestante (reg_bebe, nome, peso, sexo, altura, data_nasc, hora_nasc, tipo_parto, cpf_gestante, num_bercario) VALUES ('" . $regbebe . "','" . $nomebebe . "','" . $pesobebe . "','" . $sexo_bebe . "','" . $alturabebe . "','" . $nasc_bebe . "','" . $hora_bebe . "','" . $tipo_parto . "','" . $cpfgest . "','" . $numbercario . "')";
        
        $sql_bercario = "INSERT INTO bercario (num_bercario, num_berco) VALUES ('" . $numbercario . "','" . $numberco . "')";

        $sql_contato = "INSERT INTO contato (telefone, cpf_gestante, cpf_pessoa) VALUES ('" . $telegest . "','" . $cpfgest . "','" . $cpfgest . "')";

        if(mysqli_query($conecta, $sql_gest)) {
            $msg = "Dados inseridos em gestante com sucesso!";
        } else {
            $msg = $sql_gest;
            return $msg;
        }

        if(mysqli_query($conecta, $sql_pessoa)) {
            $msg = "Dados inseridos em pessoa com sucesso!";
        } else {
            $msg = $sql_pessoa;
            return $msg;
        }

        if(mysqli_query($conecta, $sql_med)) {
            $msg = "Dados inseridos em medico com sucesso!";
        } else {
            $msg = $sql_med;
            return $msg;
        }

        if(mysqli_query($conecta, $sql_bebe)) {
            $msg = "Dados inseridos em bebe com sucesso!";
        } else {
            $msg = $sql_bebe;
            return $msg;
        }

        if(mysqli_query($conecta, $sql_bercario)) {
            $msg = "Dados inseridos em bercario com sucesso!";
        } else {
            $msg = $sql_bercario;
            return $msg;
        }

        if(mysqli_query($conecta, $sql_contato)) {
            $msg = "Dados inseridos com sucesso!";
        } else {
            $msg = $sql_contato;
            return $msg;
        }
    }

    echo $msg;
*/
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
                <input type="text" name="telefone" placeholder="DDD-XXXXXXXX"  required>

            <!-- <h2> - Dados do Acompanhante</h2>
                <h4>Nome do Acompanhante:</h4>
                <input type="text" name="nome_acomp" placeholder="Nome Completo" required>
                <h4>CPF do Acompanhante:</h4>
                <input type="text" name="cpf_acomp" placeholder="CPF" required>
                <h4>Data de Nascimento:</h4>
                <input type="date" name="nasc_acomp" required>
                <h4>Relação de Parentesco:</h4>
                <input type="text" name="parentesco" placeholder="Parentesco" required> -->

            <!-- <h2> - Dados do Médico Responsável</h2>
                <h4>Nome do Médico:</h4>
                <input type="text" name="nome_medico" placeholder="Nome do Médico" required> -->
                <h4>Nº do CRM:</h4>
                <input type="text" name="crm_medico" placeholder="CRM" required>
            
            <!-- <h2> - Dados do Recém Nascido </h2>
                <h4>Nº de Registro:</h4>
                <input type="text" name="reg_bebe" placeholder="XXXXXX" required>
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
                <input type="text" name="num_bercario" required>
                <h4>Nº Berço:</h4>
                <input type="text" name="num_berco" required>
                 -->
            <br><br><br>
            <input type="submit" name="enviar" value="Cadastrar">

            <label for="msg">Mensagem:<font color="#AA0000"><?php echo $msg; ?></font>
                
            </form>
        </main>
    </body>
</html>

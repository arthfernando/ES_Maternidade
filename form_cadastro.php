<?php require_once("conexao/conexao.php") ?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Paciente</title>
    </head>

    <body>
        <main>
            <form action="form_cadastro.php" method="POST">
            <h2> - Dados do Paciente</h2>
                <h4>Nome do Paciente:</h4>
                <input type="text" name="nome_gestante" placeholder="Nome Completo" required>
                <h4>CPF do Paciente:</h4>
                <input type="text" name="cpf_gestante" placeholder="CPF" required>
                <h4>Data de Nascimento:</h4>
                <input type="date" name="nasc_gestante" required>
                <h4>Telefone para Contato:</h4>
                <input type="tel" name="telefone" placeholder="DDD-XXXXXXXX" pattern="[0-9]{3}-[0-9]{8}" required>

            <h2> - Dados do Acompanhante</h2>
                <h4>Nome do Acompanhante:</h4>
                <input type="text" name="nome_acomp" placeholder="Nome Completo" required>
                <h4>CPF do Acompanhante:</h4>
                <input type="text" name="cpf_acomp" placeholder="CPF" required>
                <h4>Data de Acompanhante:</h4>
                <input type="date" name="nasc_acomp" required>
                <h4>Relação de Parentesco:</h4>
                <input type="text" name="parentesco" placeholder="Parentesco" required>

            <h2> - Dados do Médico Responsável</h2>
                <h4>Nome do Médico:</h4>
                <input type="text" name="nome_medico" placeholder="Nome do Médico" required>
                <h4>Nº do CRM:</h4>
                <input type="text" name="crm_medico" placeholder="CRM" required>
            
            <h2> - Dados do Recém Nascido </h2>
            <h4>Nº de Registro:</h4>
            <input type="text" name="nome_bebe" placeholder="XXXXXX" required>
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
            <br><br><br>
            <input type="submit" value="Cadastrar">
                
            </form>
        </main>
    </body>
</html>

<?php mysqli_close($conecta) ?>
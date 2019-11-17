<?php

class Gestante {
    private $cpfgest;
    private $nomegest;
    private $datagest;
    private $telegest;
    private $crmmed;
    private $erro;

    public function __construct($cpf, $nome, $data, $tel, $crm) {
        $this->cpfgest = $cpf;
        $this->nomegest = $nome;
        $this->datagest = $data;
        $this->telegest = $tel;
        $this->crmmed = $crm;
        $this->error = "";
    }

    public function save() {
        $conn = Connection::getInstance();

        if(!$conn) {
            $msg = "Falha na conexão";
        } else {
            $sql = "INSERT INTO gestante (cpf, nome, data_nasc, telefone, crm_medico) VALUES ('" . $this->cpfgest . "','" . $this->nomegest . "','" . $this->datagest . "','" . $this->telegest . "','" . $this->crmmed . "')";
            pg_query($conn, $sql);
            $msg = "";
        }

        return $msg;
    }

    public function check() {
        $conn = Connection::getInstance();
        $query = "SELECT cpf FROM gestante WHERE cpf = '" . $this->cpfgest . "'";

        $result = pg_query($conn, $query);

        if(!pg_fetch_assoc($result)) {
            return TRUE;
        } else {
            $this->error = "CPF de Paciente já cadastrado.";
            return FALSE;
        }
    }

    public function getError() {
        return $this->error;
    }
}

?>
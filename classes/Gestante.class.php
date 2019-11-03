<?php

class Gestante {
    private $cpfgest;
    private $nomegest;
    private $datagest;
    private $telegest;
    private $crmmed;

    public function __construct($cpf, $nome, $data, $tel, $crm) {
        $this->cpfgest = $cpf;
        $this->nomegest = $nome;
        $this->datagest = $data;
        $this->telegest = $tel;
        $this->crmmed = $crm;
    }

    public function save() {
        $conn = Connection::getInstance();

        if(!$conn) {
            $msg = "Falha na conexão";
        } else {
            $sql = "INSERT INTO gestante (cpf, nome, data_nasc, telefone, crm_medico) VALUES ('" . $this->cpfgest . "','" . $this->nomegest . "','" . $this->datagest . "','" . $this->telegest . "','" . $this->crmmed . "')";
        }

        if(mysqli_query($conn, $sql)) {
            $msg = "Dados Inseridos.";
        } else {
            die(mysqli_error($conn));
        }

        return $msg;
    }

}

?>
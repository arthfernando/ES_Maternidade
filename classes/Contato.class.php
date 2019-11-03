<?php

class Contato {
    private $tel;
    private $cpf_g;
    private $cpf_p;

    public function __construct($t, $g, $p) {
        $this->tel = $t;
        $this->cpf_g = $g;
        $this->cpf_p = $p;
    }

    public function save() {
        $conn = Connection::getInstance();

        if(!$conn) {
            $msg = "Falha na conexão.";
        } else {
            $sql_contato = "INSERT INTO contato (telefone, cpf_gestante, cpf_pessoa) VALUES ('" . $this->tel . "','" . $this->cpf_g . "','" . $this->cpf_p . "')";
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
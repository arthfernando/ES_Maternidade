<?php

class Contato {
    private $tel;
    private $cpf_g;
    private $cpf_p;
    private $error;

    public function __construct($t, $g, $p) {
        $this->tel = $t;
        $this->cpf_g = $g;
        $this->cpf_p = $p;
        $this->error = "";
    }

    public function save() {
        $conn = Connection::getInstance();

        if(!$conn) {
            $msg = "Falha na conexão.";
        } else {
            $sql = "INSERT INTO contato (telefone, cpf_gestante, cpf_pessoa) VALUES ('" . $this->tel . "','" . $this->cpf_g . "','" . $this->cpf_p . "')";
            pg_query($conn, $sql);
            $msg = "";
        }

        return $msg;
    }

    public function check() {
        $conn = Connection::getInstance();
        $query = "SELECT telefone FROM contato WHERE telefone = '" . $this->tel . "'";

        $result = pg_query($conn, $query);

        if(!pg_fetch_assoc($result)) {
            return TRUE;
        } else {
            $this->error = "Telefone para contato já cadastrado.";
            return FALSE;
        }
    }

    public function getError() {
        return $this->error;
    }
}

?>
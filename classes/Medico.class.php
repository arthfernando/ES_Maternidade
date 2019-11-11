<?php

class Medico {
    private $nomemed;
    private $crm;

    public function __construct($c, $n) {
        $this->crm = $c;
        $this->nomemed = $n;
    }

    public function save() {
        $conn = Connection::getInstance();

        if(!$conn) {
            $msg = "Falha na conexão.";
        } else {
            $sql = "INSERT INTO medico (crm, nome) VALUES ('" . $this->crm . "','" . $this->nomemed . "')";
        }

        if(pg_query($conn, $sql)) {
            $msg = "Dados Inseridos.";
        } else {
            die(pg_result_error($conn));
        }

        return $msg;
    }

    public function getCRM() {
        return $this->crm;
    }

    public function getNome() {
        return $this->nomemed;
    }
}

?>
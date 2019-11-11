<?php

class Pessoa {
    
    private $cpfacomp;
    private $nomeacomp;
    private $parentesco;
    private $dataacomp;
    private $cpfgest;

    public function __construct($n, $cpf, $d, $p, $gest) {
        $this->cpfacomp = $cpf;
        $this->nomeacomp = $n;
        $this->parentesco = $p;
        $this->dataacomp = $d;
        $this->cpfgest = $gest;
    }

    public function save() {
        $conn = Connection::getInstance();

        if(!$conn) {
            $msg = "Falha na conexão.";
        } else {
            $sql = "INSERT INTO pessoa (cpf, nome, parentesco, data_nasc, cpf_gestante) VALUES ('" . $this->cpfacomp . "','" . $this->nomeacomp . "','" . $this->parentesco . "','" . $this->dataacomp . "','" . $this->cpfgest . "')";
        }

        if(pg_query($conn, $sql)) {
            $msg = "Dados Inseridos.";
        } else {
            die(pg_result_error($conn));
        }

        return $msg;
    }
}

?>
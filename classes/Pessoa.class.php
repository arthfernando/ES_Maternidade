<?php

class Pessoa {
    
    private $nomeacomp;
    private $cpfacomp;
    private $dataacomp;
    private $parentesco;

    public function __construct($n, $cpf, $d, $p) {
        $this->nomeacomp = $n;
        $this->cpfacomp = $cpf;
        $this->dataacomp = $d;
        $this->parentesco = $p;
    }

    public function save() {
        $conn = Connection::getInstance();

        if(!$conn) {
            $msg = "Falha na conexão.";
        } else {
            $sql = "INSERT INTO pessoa (cpf, nome, parentesco, data_nasc, cpf_gestante) VALUES ('" . $this->cpfacomp . "','" . $this->nomeacomp . "','" . $this->parentesco . "','" . $this->dataacomp . "')";
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
<?php

class Pessoa {
    
    private $cpfacomp;
    private $nomeacomp;
    private $parentesco;
    private $dataacomp;
    private $cpfgest;
    private $error;

    public function __construct($n, $cpf, $d, $p, $gest) {
        $this->cpfacomp = $cpf;
        $this->nomeacomp = $n;
        $this->parentesco = $p;
        $this->dataacomp = $d;
        $this->cpfgest = $gest;
        $this->error = "";
    }

    public function save() {
        $conn = Connection::getInstance();

        if(!$conn) {
            $msg = "Falha na conexão.";
        } else {
            $sql = "INSERT INTO pessoa (cpf, nome, parentesco, data_nasc, cpf_gestante) VALUES ('" . $this->cpfacomp . "','" . $this->nomeacomp . "','" . $this->parentesco . "','" . $this->dataacomp . "','" . $this->cpfgest . "')";
            pg_query($conn, $sql);
            $msg = "";
        }   
        
        return $msg;
    }

    public function check() {
        $conn = Connection::getInstance();
        $query = "SELECT cpf FROM pessoa WHERE cpf = '" . $this->cpfacomp . "'";

        $result = pg_query($conn, $query);

        if(!pg_fetch_assoc($result)) {
            return TRUE;
        } else {
            $this->error = "CPF de Acompanhante já cadastrado.";
            return FALSE;
        }
    }

    public function getError() {
        return $this->error;
    }
}

?>
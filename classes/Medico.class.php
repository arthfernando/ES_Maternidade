<?php

class Medico {
    private $nomemed;
    private $crm;
    private $error;

    public function __construct($c, $n) {
        $this->crm = $c;
        $this->nomemed = $n;
        $this->error = "";
    }

    public function save() {
        $conn = Connection::getInstance();

        if(!$conn) {
            $msg = "Falha na conexão.";
        } else {
            $sql = "INSERT INTO medico (crm, nome) VALUES ('" . $this->crm . "','" . $this->nomemed . "')";
            pg_query($conn, $sql);
            $msg = "";
        }   
        
        return $msg;
    }

    public function check() {
        $conn = Connection::getInstance();
        $query = "SELECT crm FROM medico WHERE crm = '" . $this->crm . "'";

        $result = pg_query($conn, $query);

        if(!pg_fetch_assoc($result)) {
            return TRUE;
        } else {
            $this->error = "CRM já cadastrado.";
            return FALSE;
        }
    }

    public function getError() {
        return $this->error;
    }
}

?>
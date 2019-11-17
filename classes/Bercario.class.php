<?php

class Bercario {
    private $num_bercario;
    private $num_berco;
    private $error;

    public function __construct($num_bercario, $num_berco) {
        $this->num_bercario = $num_bercario;
        $this->num_berco = $num_berco;
        $this->error = "";
    }

    public function save() {
        $conn = Connection::getInstance();

        if(!$conn) {
            $msg = "Falha na conexão.";
        } else {
            $sql = "INSERT INTO bercario (num_bercario, num_berco) VALUES ('" . $this->num_bercario . "','" . $this->num_berco . "')";
            pg_query($conn, $sql);
            $msg = "";
        }

        return $msg;
    }

    public function check() {
        $conn = Connection::getInstance();
        $query = "SELECT num_bercario FROM bercario WHERE num_bercario = '" . $this->num_bercario . "'";

        $result = pg_query($conn, $query);

        if(!pg_fetch_assoc($result)) {
            return TRUE;
        } else {
            $this->error = "Berçário já cadastrado.";
            return FALSE;
        }
    }

    public function getError() {
        return $this->error;
    }
}

?>
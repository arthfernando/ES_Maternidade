<?php

class Bercario {
    private $num_bercario;
    private $num_berco;

    public function __construct($num_bercario, $num_berco) {
        $this->num_bercario = $num_bercario;
        $this->num_berco = $num_bercario;
    }

    public function save() {
        $conn = Connection::getInstance();

        if(!$conn) {
            $msg = "Falha na conexão.";
        } else {
            $sql = "INSERT INTO bercario (num_bercario, num_berco) VALUES ('" . $this->num_bercario . "','" . $this->num_berco . "')";
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
<?php

class Connection {
    public function getInstance() {
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "maternidade";

        $conn = mysqli_connect($servidor,$usuario, $senha, $banco);

        if(!$conn) {
            $conn = NULL;
        }

        return $conn;
    }

    public function closeInstance() {
        mysqli_close($conn);
    }
}

?>
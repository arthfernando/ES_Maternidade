<?php

class Pessoa {
    
    private $nomebebe;
    private $pesobebe;
    private $alturabebe;
    private $sexo_bebe;
    private $nasc_bebe;
    private $hora_bebe;
    private $tipo_parto;

    public function __construct($n, $p, $a, $s, $nasc, $h, $tp) {
        $this->nomebebe = $n;
        $this->pesobebe = $p;
        $this->alturabebe = $a;
        $this->sexo_bebe = $s;
        $this->nasc_bebe = $nasc;
        $this->hora_bebe = $h;
        $this->tipo_parto = $tp;
    }

    public function save() {
        $conn = Connection::getInstance();

        if(!$conn) {
            $msg = "Falha na conexão.";
        } else {
            $sql= "INSERT INTO bebe (nome, peso, sexo, altura, data_nasc, hora_nasc, tipo_parto, cpf_gestante, num_bercario) VALUES ('" . $this->nomebebe . "','" . $this->pesobebe . "','" . $this->sexo_bebe . "','" . $this->alturabebe . "','" . $this->nasc_bebe . "','" . $this->hora_bebe . "','" . $this->tipo_parto . "','" . $this->cpfgest . "','" . $this->numbercario . "')";
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
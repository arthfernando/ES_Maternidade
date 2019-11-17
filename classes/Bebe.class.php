<?php

class Bebe {
    
    private $nomebebe;
    private $pesobebe;
    private $sexo_bebe;
    private $alturabebe;
    private $nasc_bebe;
    private $hora_bebe;
    private $tipo_parto;
    private $cpfgest;
    private $numberc;
    // private $error;

    public function __construct($n, $p, $a, $s, $nasc, $h, $tp, $gest, $nb) {
        $this->nomebebe = $n;
        $this->pesobebe = $p;
        $this->sexo_bebe = $s;
        $this->alturabebe = $a;
        $this->nasc_bebe = $nasc;
        $this->hora_bebe = $h;
        $this->tipo_parto = $tp;
        $this->cpfgest = $gest;
        $this->numberc = $nb;
        // $this->error = "";
    }

    public function save() {
        $conn = Connection::getInstance();

        if(!$conn) {
            $msg = "Falha na conexão.";
        } else {
            $sql= "INSERT INTO bebe (nome, peso, sexo, altura, data_nasc, hora_nasc, tipo_parto, cpf_gestante, num_bercario) VALUES ('" . $this->nomebebe . "','" . $this->pesobebe . "','" . $this->sexo_bebe . "','" . $this->alturabebe . "','" . $this->nasc_bebe . "','" . $this->hora_bebe . "','" . $this->tipo_parto . "','" . $this->cpfgest . "','" . $this->numberc . "')";
            pg_query($conn, $sql);
            $msg = "";
        }

        return $msg;
    }

    // public function check() {
    //     $conn = Connection::getInstance();
    //     $query = "SELECT crm FROM medico WHERE crm = '" . $this->crm . "'";

    //     $result = pg_query($conn, $query);

    //     if(!pg_fetch_assoc($result)) {
    //         return TRUE;
    //     } else {
    //         $this->error = "CRM já cadastrado.";
    //         return FALSE;
    //     }
    // }

    // public function getError() {
    //     return $this->error;
    // }   
}

?>
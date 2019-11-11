<?php

class Connection {
    public function getInstance() {

        $conn = pg_connect("host=localhost port=5432 dbname=maternidade user=postgres password=1234");

        if(!$conn) {
            $conn = NULL;
        }

        return $conn;
    }

    public function closeInstance() {
        pg_close($conn);
    }
}

?>
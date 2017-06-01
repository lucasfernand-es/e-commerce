<?php

Class Database {

    const ServerName = "localhost";
    const UserName = "root";
    const Password = "root";
    const DatabaseName = "e_commerce";

   /*
    *  private function connection() {
        try {
            // Cria uma string de conexão com o banco de dados MYSQL
            //$GLOBALS['conn'] = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn = new PDO("mysql:host=$this->serverName; dbname=$this->$this->databaseName", $this->userName, $this->password);
            // set the PDO error mode to exception
            $GLOBALS['conn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();

        }

    }

    public function select($table, $rows = '*', $where = null, $order = null) {
        echo 'database : ' . $table;


    }
    */

}
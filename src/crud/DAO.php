<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

abstract class DAO
{
    protected $pdo;
    protected $className;
    protected $databaseName;


    public function __construct()
    {
        require_once "Database.php";
        $this->pdo =
            new PDO("mysql:host=". Database::ServerName .";dbname=" . Database::DatabaseName,
                Database::UserName, Database::Password);
    }

    public function getAll() {
        $objectArray = array();


        $statementResult = $this->pdo->prepare('SELECT * FROM ' . $this->databaseName );
        $statementResult->execute();


        while ($row = $statementResult->fetchObject($this->className)) {
            $objectArray[] = $row;
        }

        return $objectArray;
    }

    public function get($id) {

        $return = null;

        $statementResult = $this->pdo->prepare('SELECT * FROM ' . $this->databaseName . ' WHERE id = 2 LIMIT 1');
        //$statementResult->bindParam(':id', $id);
        $statementResult->execute();

        while ($row = $statementResult->fetchObject($this->className)) {
            $return = $row;
        }

        return $return;
    }

    public function insert() {

    }

}

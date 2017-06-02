<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

abstract class DAO
{
    protected $pdo;
    protected $className;
    protected $tableName;

    protected $where;


    public function __construct()
    {
        require_once "Database.php";
        $this->pdo =
            new PDO("mysql:host=". Database::ServerName .";dbname=" . Database::DatabaseName,
                Database::UserName, Database::Password);
    }

    private function getWhereClauses() {


        if($this->where) {
            $whereClauses = " WHERE ";
            $first = true;

            //print_r($this->where);
            foreach ($this->where as $clause => $value) {
                if(!$first)
                    $whereClauses .=  " AND ";


                switch ($value['condition']){
                    case 'LIKE':
                        $whereClauses .=  "UPPER(" .$clause . ") LIKE UPPER(CONCAT('%', :". $clause .", '%'))  ";
                        break;
                    default:
                        $whereClauses .=  $clause . ' = :' .$clause . ' ';
                        break;
                }

                $first = false;
            }
            return $whereClauses;
        }
        else
            return "";

    }

    private function bindStatement($statementResult, $fields) {

        if($fields) {
            $bind = array();
            foreach ($fields as $field => $value) {
                $bind[$field] = $value['value'];
                $statementResult->bindParam(':' . $field,  $bind[$field]);
            }
        }

    }

    public function retrieve() {


        $objectArray = array();

        //print_r('SELECT * FROM ' . $this->databaseName . $this->getWhereClauses());

        $statementResult = $this->pdo->prepare('SELECT * FROM ' . $this->tableName . $this->getWhereClauses());
        $this->bindStatement($statementResult, $this->where);

        $statementResult->execute();

        //print_r($statementResult);

        while ($row = $statementResult->fetchObject($this->className)) {
            $objectArray[] = $row;
        }

        return $objectArray;
    }

    public function retrieveUnique($id) {

        if(!$this->where)
            $this->where = array();


        $this->where['id'] =  array();
        $this->where['id']['value'] = $id;
        $this->where['id']['condition'] = '=';

        $return = $this->retrieve();


        return $return;

    }

    public function retrieveSpecific($VO=null) {

        if(!$this->where)
            $this->where = array();
        //$this->where['id'] = $id;


        foreach ($VO->getCreateProperties() as $property) {
            if($VO->__get($property)) {

                $this->where[$property] =  array();
                $this->where[$property]['value'] = $VO->__get($property);
                $this->where[$property]['condition'] = 'LIKE';

            }
        }


        $return = $this->retrieve();
        return $return;

    }

    public function create(ValueObject $VO) {
        $fields = "";
        $values = "";

        $first = true;
        foreach ($VO->getCreateProperties() as $property) {
            if(!$first) {
                $fields .= ", ";
                $values .= ", ";
            }
            $fields .= $property;
            $values .= " :". $property;
            $first = false;
        }

        try {
            $statementResult = $this->pdo->prepare('INSERT INTO ' . $this->tableName . ' ('. $fields .') VALUES ('. $values .')');

            $value = array();
            foreach ($VO->getCreateProperties() as $property) {
                $value[$property] = $VO->__get($property);
                $statementResult->bindParam(':' . $property,  $value[$property]);
            }
            $statementResult->execute();

            echo 'true';
        }
        catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function update(ValueObject $VO) {
        try {
            $set = "";

            $first = true;
            foreach ($VO->getUpdateProperties() as $property) {
                if(!$first) {
                    $set .= ", ";
                }
                $set .= $property . "= :". $property;
                $first = false;
            }

            $statementResult = $this->pdo->prepare('UPDATE ' . $this->tableName . ' SET ' . $set . ' WHERE id = :id ');

            $value = array();
            foreach ($VO->getUpdateProperties() as $property) {
                $value[$property] = $VO->__get($property);

                $statementResult->bindParam(':' . $property,  $value[$property]);
            }

            $value["id"] = $VO->__get("id");
            $statementResult->bindParam(':id', $value["id"]);

            $statementResult->execute();


            echo 'true';
        }
        catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function delete($id) {


       try {
           $statementResult = $this->pdo->prepare('DELETE FROM ' . $this->tableName . ' WHERE id = :id LIMIT 1');
           $statementResult->bindParam(':id', $id);
           $statementResult->execute();


           return 'true';
       }
       catch(PDOException $e) {
           echo "Error: " . $e->getMessage();
       }
    }

}
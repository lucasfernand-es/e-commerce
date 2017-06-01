<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

abstract Class ValueObject {

    protected $id;

    protected $daoClass;

    public function __get($attribute){
        return $this->$attribute;
    }

    public function __set($attribute, $value){
        return $this->$attribute = $value;
    }

    public function getAll() {
        return $this->daoClass->getAll();
    }
    public function get() {

        return $this->daoClass->get($this->id);
    }

    public function insert() {
        return $this->daoClass->insert();
    }
}

/*
 *
    private $fields;
    private $values;
    private $whereClause;
    $valueObject = new ValueObject;
    $valueObject->insert();

    public function select(){


        echo "Parent";

        $database = new Database();

        $database->select($this::ClassName);
    }

foreach (glob("classes/*.php") as $filename)
{
    include $filename;
}
 */


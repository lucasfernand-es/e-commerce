<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "DAO.php";

Class SupplierDAO extends DAO{

    public function __construct(){

        $this->databaseName = "supplier";
        $this->className = "SupplierVO";

        parent::__construct();

    }

    public function insert($object) {

    }

}

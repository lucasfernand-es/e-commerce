<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "DAO.php";
include_once "SupplierVO.php";

Class SupplierDAO extends DAO{

    public function __construct()
    {

        $this->tableName = "supplier";
        $this->className = "SupplierVO";

        parent::__construct();

    }


}


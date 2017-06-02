<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "DAO.php";
include_once "ProductVO.php";

Class ProductDAO extends DAO{

    public function __construct()
    {
        $this->tableName = "product";
        $this->className = "ProductVO";

        parent::__construct();


    }


}


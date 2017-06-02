<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "ValueObject.php";
include_once "SupplierDAO.php";

Class SupplierVO extends ValueObject {

    protected $name;
    protected $email;


    public function __construct(){
        $this->daoClass = new SupplierDAO();
    }


}


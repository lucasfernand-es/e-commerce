<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "UserVO.php";
include_once "ClientDAO.php";

Class ClientVO extends UserVO {

    public function __construct(){

        $this->__set("type", 1);
        $this->daoClass = new ClientDAO();
    }



}


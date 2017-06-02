<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "DAO.php";
include_once "UserVO.php";

Class ClientDAO extends UserDAO{

    public function __construct()
    {
        parent::__construct();

        $this->className = "ClientVO";

    }

    public function retrieve() {

        if(!$this->where)
            $this->where = array();

        $this->where['type'] =  array();
        $this->where['type']['value'] = 1;
        $this->where['type']['condition'] = '=';

        return parent::retrieve();

    }


}


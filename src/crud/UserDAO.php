<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "DAO.php";
include_once "UserVO.php";

Class UserDAO extends DAO{

    public function __construct()
    {

        $this->tableName = "user";
        $this->className = "UserVO";

        parent::__construct();

    }


    public function login(UserVO $user) {


        if(!$this->where)
            $this->where = array();

        $this->where['email'] =  array();
        $this->where['email']['value'] = $user->email;
        $this->where['email']['condition'] = '=';

        //$where['password'] = $user->password;

        return parent::retrieve();

    }



}

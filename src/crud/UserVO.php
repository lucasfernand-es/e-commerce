<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "ValueObject.php";
include_once "UserDAO.php";

Class UserVO extends ValueObject {

    protected $name;
    protected $email;
    protected $password;
    protected $phone;
    protected $type;


    public function __construct(){
        $this->daoClass = new UserDAO();
    }


    public function getUpdateProperties() {

        $properties = $this->getProperties();
        unset($properties[2]); // Não permitir alterar senha

        return $properties;
    }


    public function create($object){
        $password = $object['password'];

        $object['password'] = $this->generateHash($password);

        parent::create($object);
    }

    public function login() {
        $return = $this->daoClass->login($this);

        if(!$return || empty($return)) {
            return "Usuário não encontrado";
        }
        else {
            $user = $return[0];

            if( $this->verify($user->password) ) {

                //session_destroy();
                session_start();
                $_SESSION['session'] = $user->name;

                if($user->type == 0){
                    $_SESSION['admin'] = $user->email;
                }

                return true;
            }
            else {
                echo 'Senha Incorreta.';
            }

        }

    }

    private function generateHash($password) {
        if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
            $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
            return crypt($password, $salt);
        }
    }

    private function verify($hashedPassword) {
        return crypt($this->password, $hashedPassword) == $hashedPassword;
    }
}

/*
if ($result->rowCount() <= 0) {
    $message = '.';
}
else {
    $user = $result->fetch(PDO::FETCH_OBJ);

    // Hashing the password with its hash as the salt returns the same hash
    // Fonte: https://alias.io/2010/01/store-passwords-safely-with-php-and-mysql/
    if ( hash_equals($user->userPassword, crypt($userPassword, $user->userPassword)) ) {
        session_start();
        $_SESSION['userSession'] = $user->userName;

        if($user->userType == 0){
            $_SESSION['userAdmin'] = $userEmail;
        }


        //$_SESSION['userName'] = $userEmail;
        $message = true;
    }
    else {
        $message = 'Senha Incorreta.';
    }
}


*/
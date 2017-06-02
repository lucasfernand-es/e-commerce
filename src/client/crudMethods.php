<?php
/**
 * Created by PhpStorm.
 * User: lfernandes
 * Date: 5/7/17
 * Time: 12:56 AM
 */


require_once "../connection.php";


// Método responsável por fazer login do usuário
function login($userEmail, $userPassword) {

    $message = "";

    try {
        $result=$GLOBALS['conn']->prepare("SELECT userPassword, userName, userType FROM user WHERE userEmail = :userEmail LIMIT 1");
        $result->bindParam(':userEmail', $userEmail);
        $result->execute();


        if ($result->rowCount() <= 0) {
            $message = 'Usuário não encontrado.';
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
                $message = '';
            }
        }

    }
    catch (PDOException $e) {
        $message = $e->getMessage();
    }
    finally {
        $GLOBALS['conn']= null;
    }

    return $message;
}
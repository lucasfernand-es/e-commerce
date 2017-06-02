<?php
/**
 * Created by PhpStorm.
 * User: lfernandes
 * Date: 5/6/17
 * Time: 8:58 AM
 */

require_once "../connection.php";
require_once "crudMethods.php";


if(isset($_POST["action"])) // Verifica se há um atributo action no php
{

    // Realiza o login
    if($_POST["action"] == "login") {
        $data = $_POST["data"];

        print_r($data)

        $userEmail = $data['email'];
        $userPassword = $data['password'];

        echo login($userEmail, $userPassword);

    }
    // Logout do sistema
    else if($_POST["action"] == "logout") {
        session_start();
        unset($_SESSION['userSession']);
        unset($_SESSION['userAdmin']);

    }

    //For Load All Data
    else if ($_POST["action"] == "loadAll") {
        try {
            $result=$conn->prepare("SELECT * FROM user WHERE userType = 1");
            $result->execute();

            if($result->rowCount() > 0) {

                while($row = $result->fetch(PDO::FETCH_OBJ)) {
                    include "resultData.php"; // inclui uma chamada da Supplier Data para exibir o HTML de cada linha
                }

            }
            else {
                include_once "../loadNoResults.php";
            }
        }
        catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
        finally {
            $conn= null;
        }
    }

    //For Load All Data
    if ($_POST["action"] == "loadOne") {
        try {
            $result=$conn->prepare("SELECT * FROM user WHERE userID = :userID AND userType = 1 LIMIT 1");
            $result->bindParam(':userID', $_POST['itemID']);
            $result->execute();

            if($result->rowCount() > 0) {

                while($row = $result->fetch(PDO::FETCH_OBJ)) {
                    $data["clientName"] = $row->userName;
                    $data["clientEmail"] = $row->userEmail;
                    $data["clientPhone"] = $row->userPhone;
                }

            }
            else {
                $data['error'] =  "Item " .$_POST['itemID']. "Not Found";
            }
        }
        catch (PDOException $e) {
            $data['error'] = "Error: ".$e->getMessage();
        }
        finally {
            echo json_encode($data);
            $conn= null;
        }
    }

    // Adicionar um novo cliente
    if($_POST["action"] == "add")
    {

        try {
            $result = $conn->prepare("INSERT INTO user (userName, userEmail, userPhone, userPassword, userType) 
                                                VALUES (:userName, :userEmail, :userPhone, :userPassword, 1)");

            $result->bindParam(':userName', $_POST['clientName']);
            $result->bindParam(':userEmail', $_POST['clientEmail']);
            $result->bindParam(':userPhone', $_POST['clientPhone']);

            // Encriptando a senha dos usuários
            // Fonte: https://alias.io/2010/01/store-passwords-safely-with-php-and-mysql/
            $cost = 10;
            $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
            $salt = sprintf("$2a$%02d$", $cost) . $salt;

            $userPassword = crypt($_POST['clientPassword'], $salt);
            $result->bindParam(':userPassword', $userPassword);

            $result->execute();

            echo 'true';

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        finally {
            $conn= null;
        }
    }

    // Alterar um fornecedor
    if($_POST["action"] == "edit")
    {
        try {
            $result = $conn->prepare("UPDATE user SET userName = :userName,  userEmail = :userEmail, userPhone = :userPhone WHERE userID = :userID AND userType = 1");

            $result->bindParam(':userName', $_POST['clientName']);
            $result->bindParam(':userEmail', $_POST['clientEmail']);
            $result->bindParam(':userPhone', $_POST['clientPhone']);
            $result->bindParam(':userID', $_POST['itemID']);
            $result->execute();

            echo 'true';

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        finally {
            $conn= null;
        }
    }

    // Apagar um fornecedor
    if($_POST["action"] == "delete")
    {

        try {

            $result = $conn->prepare("DELETE FROM user WHERE userID = :userID AND userType = 1");
            $result->bindParam(':userID', $_POST['itemID']);
            $result->execute();

            echo 'true';
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        finally {
            $conn= null;
        }
    }
}
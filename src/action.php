<?php
/**
 * Created by PhpStorm.
 * User: lfernandes
 * Date: 5/6/17
 * Time: 8:58 AM
 */

foreach (glob("crud/*.php") as $filename)
{
    include_once $filename;
}


if(isset($_POST["action"]))
{
    $action = $_POST["action"];
    $className = $_POST["class"];

    switch ($className) {
        case "supplier":
            $class = new SupplierVO();
            break;
        case "product":
            $class = new ProductVO();
            break;
        case "client":
            $class = new ClientVO();
            break;
        case "user":
            $class = new UserVO();
            break;
        default:
            break;
    }

    switch ($action) {
        case "login":
            $data = $_POST["data"];

            //print_r($data);


            $email = $data['email'];
            $password = $data['password'];
            $class->__set('email', $email);
            $class->__set('password', $password);

            echo $class->login();


            break;
        case "logout":

            session_start();
            unset($_SESSION['session']);
            unset($_SESSION['admin']);

            break;
        case "retrieve":

            if( isset($_POST["id"]) ) {

                $id = $_POST["id"];
                $class->__set('id', $id);
                $results = $class->retrieveUnique();

                $result = $results[0];


                print_r($result->toJSON());
            }
            else {

                if( isset($_POST["search"]) ) {
                    $object = $_POST["object"];
                    $result = $class->retrieveSpecific($object);
                }
                else {
                    $result = $class->retrieve();
                }


                if(isset($_POST["load"]) ) {

                    print_r($class->arrayToJSON($result));
                }
                else {
                    if($result && !empty($result)){

                        foreach ($result as $row) {
                            $row = ($row); //json_decode


                            include "./". $className ."/resultData.php";
                        }
                    }
                    else {
                        include_once "loadNoResults.php";
                    }
                }

            }


            break;
        case "create":

            $object = $_POST["object"];
            return $class->create($object);

            break;
        case "update":
            $object = $_POST["object"];
            $id = $_POST["id"];

            $class->__set('id', $id);

            return $class->update($object);

            break;

        case "delete":

            $id = $_POST["id"];
            $class->__set('id', $id);
            echo $class->delete();


            break;
        default:
            break;
    }
}
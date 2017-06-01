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
        default:
            break;
    }

    switch ($action) {
        case "select":
            if( isset($_POST["itemID"]) ) {

                $id = $_POST["itemID"];
                $class->__set('id', $id);
                $result = $class->get();


                echo json_encode($result);
            }
            else {

                $result = $class->getAll();
                if($result && !empty($result)){

                    foreach ($result as $row) {
                        include "./". $className ."/resultData.php";
                    }
                }
                else {
                    include_once "loadNoResults.php";
                }

            }


            break;
    }

/*
 *     //For Load All Data
    if ($_POST["action"] == "loadAll") {
        try {
            $result=$GLOBALS['conn']->prepare("SELECT * FROM supplier");
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
            $GLOBALS['conn']= null;
        }
    }
    if ($_POST["action"] == "loadSuppliers") {
        echo json_encode(searchAllSuppliers());
    }

    //For Load All Data
    if ($_POST["action"] == "loadOne") {
        echo json_encode(searchSupplier($_POST['id']));
    }

    // Adicionar um novo fornecedor
    if($_POST["action"] == "add")
    {

        try {
            $result = $GLOBALS['conn']->prepare("INSERT INTO supplier (supplierName, supplierEmail) VALUES (:supplierName, :supplierEmail)");

            $result->bindParam(':supplierName', $_POST['supplierName']);
            $result->bindParam(':supplierEmail', $_POST['supplierEmail']);
            $result->execute();

            echo 'true';

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        finally {
            $GLOBALS['conn']= null;
        }
    }

    // Alterar um fornecedor
    if($_POST["action"] == "edit")
    {


        try {
            $result = $GLOBALS['conn']->prepare("UPDATE supplier SET supplierName = :supplierName,  supplierEmail = :supplierEmail WHERE supplierID = :supplierID");

            $result->bindParam(':supplierName', $_POST['supplierName']);
            $result->bindParam(':supplierEmail', $_POST['supplierEmail']);
            $result->bindParam(':supplierID', $_POST['itemID']);
            $result->execute();

            echo 'true';

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        finally {
            $GLOBALS['conn']= null;
        }
    }

    // Apagar um fornecedor
    if($_POST["action"] == "delete")
    {

        try {

            $result = $GLOBALS['conn']->prepare("DELETE FROM supplier WHERE supplierID = :supplierID");
            $result->bindParam(':supplierID', $_POST['itemID']);
            $result->execute();

            echo 'true';
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        finally {
            $GLOBALS['conn']= null;
        }
    }
 */

}
<?php
/**
 * Created by PhpStorm.
 * User: lfernandes
 * Date: 5/6/17
 * Time: 9:14 PM
 */

require_once "../connection.php";

function searchSupplier($id) {

    try {
        $result=$GLOBALS['conn']->prepare("SELECT * FROM supplier WHERE id = :id LIMIT 1");
        $result->bindParam(':id', $id);
        $result->execute();

        if($result->rowCount() > 0) {

            while($row = $result->fetch(PDO::FETCH_OBJ)) {
                $data["name"] = $row->name;
                $data["email"] = $row->email;
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
        return $data;
    }
}

function searchAllSuppliers() {
    try {
        $result=$GLOBALS['conn']->prepare("SELECT * FROM supplier");
        $result->execute();

        $data = array();

        if($result->rowCount() > 0) {

            while($row = $result->fetch(PDO::FETCH_OBJ)) {
                $item["supplierID"] = $row->supplierID;
                $item["supplierName"] = $row->supplierName;
                $item["supplierEmail"] = $row->supplierEmail;

                array_push($data, $item);
            }
        }
    }
    catch (PDOException $e) {
        $data['error'] = "Error: ".$e->getMessage();
    }
    finally {
        return $data;
    }

}
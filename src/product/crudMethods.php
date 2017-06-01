<?php
/**
 * Created by PhpStorm.
 * User: lfernandes
 * Date: 5/6/17
 * Time: 9:30 PM
 */


require_once "../connection.php";

function searchProduct($id) {
    try {
        $result=$GLOBALS['conn']->prepare("SELECT * FROM product WHERE productID = :productID LIMIT 1");
        $result->bindParam(':productID', $id);

        $result->execute();

        if($result->rowCount() > 0) {

            while($row = $result->fetch(PDO::FETCH_OBJ)) {

                $data["productID"] = $row->productID;
                $data["productName"] = $row->productName;
                $data["productDescription"] = $row->productDescription;
                $data["productCost"] = $row->productCost;
                $data["productQuantity"] = $row->productQuantity;
                $data["productSupplier"] = $row->productSupplier;
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
        $GLOBALS['conn'] = null;
        return $data;
    }
}

function searchAllProducts() {
    try {

        $result=$GLOBALS['conn']->prepare("SELECT * FROM product");
        $result->execute();

        if($result->rowCount() > 0) {

            $data = array();

            while($row = $result->fetch(PDO::FETCH_OBJ)) {

                $item["productID"] = $row->productID;
                $item["productName"] = $row->productName;
                $item["productDescription"] = $row->productDescription;
                $item["productCost"] = $row->productCost;
                $item["productQuantity"] = $row->productQuantity;
                $item["productSupplier"] = $row->productSupplier;

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

function addNewProduct($productName, $productDescription, $productCost, $productQuantity, $productSupplier) {

    $message = "";

    try {
        $result = $GLOBALS['conn']->prepare("INSERT INTO product (productName, productDescription, productCost, productQuantity, productSupplier) 
                                            VALUES (:productName, :productDescription, :productCost, :productQuantity, :productSupplier)");

        $result->bindParam(':productName', $productName);
        $result->bindParam(':productDescription', $productDescription);
        $result->bindParam(':productCost', $productCost);
        $result->bindParam(':productQuantity', $productQuantity);
        $result->bindParam(':productSupplier', $productSupplier);

        $result->execute();

        $message = 'true';

    } catch(PDOException $e) {
        $message =  "Error: " . $e->getMessage();
    }
    finally {
        $GLOBALS['conn'] = null;
        return $message;
    }
}

function editProduct($id, $productName, $productDescription, $productCost, $productQuantity, $productSupplier) {
    $message = "";
    try {
        $result = $GLOBALS['conn']->prepare("UPDATE product SET productName = :productName, productDescription = :productDescription, 
                                          productCost = :productCost, productQuantity = :productQuantity, productSupplier = :productSupplier
                                          WHERE productID = :productID");

        $result->bindParam(':productID', $id);
        $result->bindParam(':productName', $productName);
        $result->bindParam(':productDescription', $productDescription);
        $result->bindParam(':productCost', $productCost);
        $result->bindParam(':productQuantity', $productQuantity);
        $result->bindParam(':productSupplier', $productSupplier);

        $result->execute();

        $message = 'true';

    } catch(PDOException $e) {
        $message =  "Error: " . $e->getMessage();
    }
    finally {
        $GLOBALS['conn'] = null;
        return $message;
    }


}

function deleteProduct($id) {

    $message = "";

    try {

        $result = $GLOBALS['conn']->prepare("DELETE FROM product WHERE productID = :productID");
        $result->bindParam(':productID', $id);
        $result->execute();

        $message = 'true';
    }
    catch(PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
    finally {
        $GLOBALS['conn']= null;
        return $message;
    }
}

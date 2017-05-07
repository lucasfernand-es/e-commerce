<?php
/**
 * Created by PhpStorm.
 * User: lfernandes
 * Date: 5/6/17
 * Time: 8:58 AM
 */

require_once "crudMethods.php";

// Requisita a página de fornecedores
require_once "../supplier/crudMethods.php";



if(isset($_POST["action"])) // Verifica se há um atributo action no php
{
    // Verifica qual método action foi acionado

    //For Load All Data
    if ($_POST["action"] == "loadAll") {

        $products = searchAllProducts();


        if (!empty($products) && $products != null) {
            foreach ($products as $product) {
                $supplier = searchSupplier($product["productSupplier"]);
                $supplierName = $supplier["supplierName"];

                include "resultData.php"; // inclui uma chamada da Supplier Data para exibir o HTML de cada linha
            }
        }
        else {
            include_once "../loadNoResults.php";
        }
    }

    //For Load
    else if ($_POST["action"] == "loadOne") {

        echo json_encode( searchProduct($_POST['itemID']) );

    }
    // Adicionar um novo Produto
    else if($_POST["action"] == "add")
    {
        echo addNewProduct($_POST['productName'], $_POST['productDescription'], $_POST['productCost'], $_POST['productQuantity'], $_POST['productSupplier']);

    }

    // Alterar um produto
    else if($_POST["action"] == "edit")
    {
        echo editProduct($_POST['itemID'], $_POST['productName'], $_POST['productDescription'], $_POST['productCost'], $_POST['productQuantity'], $_POST['productSupplier']);
    }

    // Apagar um fornecedor
    else if($_POST["action"] == "delete")
    {
        echo deleteProduct($_POST['itemID']);

    }
}
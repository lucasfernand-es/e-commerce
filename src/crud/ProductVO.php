<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "ValueObject.php";
include_once "ProductDAO.php";

Class ProductVO extends ValueObject {

    protected $name;
    protected $idSupplier;
    protected $description;
    protected $cost;
    protected $quantity;


    public function __construct(){
        $this->daoClass = new ProductDAO();
    }


    public function retrieve() {

        $result = parent::retrieve();

        return $this->getSupplier($result);

    }

    public function retrieveUnique() {
        $result = parent::retrieveUnique();
        return $this->getSupplier($result);
    }

    public function retrieveSpecific($object) {
        $result = parent::retrieveSpecific($object);
        return $this->getSupplier($result);
    }

    private function getSupplier($result) {
        if($result) {
            foreach ($result as $product) {
                $supplier = new SupplierVO();

                $supplier->__set("id", $product->idSupplier);
                $supplierResult = $supplier->retrieveUnique();

                $product->supplier = $supplierResult;
            }
        }

        return $result;
    }



}


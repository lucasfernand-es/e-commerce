<?php
/**
 * Created by PhpStorm.
 * User: lfernandes
 * Date: 6/1/17
 * Time: 12:05 PM
 */

Class SupplierDTO {

    public $name;
    public $email;


    public function __construct(){
        $this->daoClass = new SupplierDAO();
    }


}

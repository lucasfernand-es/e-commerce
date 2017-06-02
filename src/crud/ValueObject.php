<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

abstract Class ValueObject {

    protected $id;

    protected $daoClass;

    public function __get($attribute){
        return $this->$attribute;
    }

    public function __set($attribute, $value){
        return $this->$attribute = $value;
    }

    public function retrieve() {
        return $this->daoClass->retrieve();
    }
    public function retrieveUnique() {

        $return =  $this->daoClass->retrieveUnique($this->__get("id"));
        return $return;
    }
    public function retrieveSpecific($object) {
        $this->readObject($object);
        return $this->daoClass->retrieveSpecific($this);
    }


    public function create($object) {
        $this->readObject($object);
        return $this->daoClass->create($this);
    }

    public function update($object) {
        $this->readObject($object);
        return $this->daoClass->update($this);
    }

    public function delete() {

        $return =  $this->daoClass->delete($this->id);
        return $return;
    }



    public function readObject($object) {
        foreach ($object as $index => $value) {
            $this->__set($index, $value);
        }
    }

    protected function getProperties() {
        $properties = array();
        foreach ($this as $property => $value) {
            if( !($property == "id")  && !($property == "daoClass") )
                $properties[] = $property;
        }
        return $properties;
    }

    public function getCreateProperties() {
        return $this->getProperties();
    }

    public function getUpdateProperties() {
        return $this->getProperties();
    }

    public function toJSON() {
        $json = array();

        $json["id"] = $this->__get("id");
        foreach($this->getProperties() as $property) {
            $json[$property] = $this->__get($property);
        }

        return json_encode($json);

    }

    public function arrayToJSON($array) {
        $json = array();
        foreach ($array as $VO) {
            $json[] = $VO->toJSON();
        }
        return json_encode($json);
    }

}
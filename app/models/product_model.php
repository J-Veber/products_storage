<?php

class ProductModel{

    public $_name;
    public $_producer;
    public $_country;
    public $_price;
    public $_expiration_date;

    public function setName($name) {
        $this->_name = $name;
    }
    public function getName() {
        return $this->_name;
    }
    public function setProducer($producer) {
        $this->_producer = $producer;
    }
    public function getProducer() {
        return $this->_producer;
    }
    public function setCountry($country) {
        $this->_country = $country;
    }
    public function getCountry() {
        return $this->_country;
    }
    public function setPrice($price) {
        $this->_price = $price;
    }
    public function getPrice() {
        return $this->_price;
    }
    public function setExpirationDate($expiration_date) {
        $this->_expiration_date = $expiration_date;
    }
    public function getExpirationDate() {
        return $this->_expiration_date;
    }
}
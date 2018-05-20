<?php

  class New_Controller extends Controller
  {
    function action_index()
    {
      if (isset( $_POST['name']) && isset( $_POST['price'])) {
        $product = new Product($this->entity_manager);
        $product->setName($_POST['name']);
        $product->setProducer($_POST['producer']);
        $product->setPrice((int)$_POST['price']);
        $product->setCountry($_POST['country']);
        $product->setExpirationDate(null);

        $product->createProduct($product);
      }
      $vars = array(
        'test' => 'Hello'
      );
      $this->fenom->display("new.tpl", $vars);
    }
  }
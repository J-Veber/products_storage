<?php

  class New_Controller extends Controller
  {
    function action_index($product_id = NULL)
    {
      if (!!$_POST) {
        $this->action_save();
      }
      $this->fenom->display("new.tpl", []);
    }

    function action_save() {
      if (isset( $_POST['name']) && isset( $_POST['price']) && intval($_POST['price'] > 0)) {
        $product = new Product($this->entity_manager);
        $product->setName($_POST['name']);
        $product->setProducer($_POST['producer']);
        $product->setPrice((int)$_POST['price']);
        $product->setCountry($_POST['country']);
        if (!!$_POST['expiration_date']) {
          $product->setExpirationDate(DateTime::createFromFormat('Y/m/d', $_POST['expiration_date']));
        } else {
          $product->setExpirationDate(null);
        }

        if (strlen($product->getName()) > 0 && strlen($product->getPrice()) > 0
          && (int)$product->getPrice() >= 0) {
          $product->createProduct($product);
          header('Location: /list');
        }
      }
    }
  }
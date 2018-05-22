<?php

  class Edit_Controller extends Controller
  {
    public $var = [];
    public $productId;

    function action_index()
    {
      if (!!$_GET['product_id']) {
        $this->productId = $_GET['product_id'];
        $product = new Product($this->entity_manager);
        $productResponse = $product->getProductById($_GET['product_id']);
        $product->setId($_GET['product_id']);
        $product->setName($productResponse[0]->getName());
        $product->setProducer($productResponse[0]->getProducer());
        $product->setPrice($productResponse[0]->getPrice());
        $product->setCountry($productResponse[0]->getCountry());
        $product->setExpirationDate($productResponse[0]->getExpirationDate());

        if (count($productResponse) > 1) {
          throw new Error('DB has ' + count($productResponse) + ' record with same id');
        } else {
          $this->var = [
            'product' => $product
          ];
        }
        $this->fenom->display("edit.tpl", $this->var);
      } else {
        $this->fenom->display('error.tpl', []);
      }
    }

    function action_save() {
      if (isset( $_POST['name']) && isset( $_POST['price'])) {
        $product = new Product($this->entity_manager);
        $product->setId($this->productId);
        $product->setName($_POST['name']);
        $product->setProducer($_POST['producer']);
        $product->setPrice((int)$_POST['price']);
        $product->setCountry($_POST['country']);
        $product->setExpirationDate(null);
        $product->updateProduct($product);
        header('Location: /list');
      }
    }
  }
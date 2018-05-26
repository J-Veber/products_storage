<?php
  class Show_Controller extends Controller {
    public $var = [];
    public $product;

    function action_index()
    {
      if (!!$_GET['product_id']) {
        $this->productId = $_GET['product_id'];
        $product = new Product($this->entity_manager);
        $productResponse = $product->getProductById($_GET['product_id']);
        $product->setId($_GET['product_id']);
        $product->setName($productResponse[0]->getName());
        $product->setProducer($productResponse[0]->getProducer());
        $product->setPrice((int)$productResponse[0]->getPrice());
        $product->setCountry($productResponse[0]->getCountry());
        $product->setExpirationDate($productResponse[0]->getExpirationDate());

        if (count($productResponse) > 1) {
          throw new Error('DB has ' + count($productResponse) + ' record with same id');
        } else {
          $this->var = [
            'product' => $product
          ];
        }
        $this->fenom->display("show.tpl", $this->var);
      } else {
        $this->fenom->display('error.tpl', []);
      }
    }
  }
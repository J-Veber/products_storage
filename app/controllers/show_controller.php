<?php
  class Show_Controller extends Controller {
    public $var = [];
    public $product;

    function action_index($product_id = NULL)
    {
      if (!!$product_id) {
        $this->productId = $product_id;
        $product = new Product($this->entity_manager);
        $productResponse = $product->getProductById($product_id);
        $product->setId($product_id);
        $product->setName($productResponse[0]->getName());
        $product->setProducer($productResponse[0]->getProducer());
        $product->setPrice((int)$productResponse[0]->getPrice());
        $product->setCountry($productResponse[0]->getCountry());
        $product->setExpirationDate($productResponse[0]->getExpirationDate());

        if (count($productResponse) > 1) {
          $this->fenom->display('error.tpl',
            [ 'msg' => 'DB has ' . count($productResponse) . ' record with same id']);
        } else {
          $this->var = [
            'product' => $product
          ];
        }
        $this->fenom->display("show.tpl", $this->var);
      } else {
        $this->fenom->display('error.tpl',
          [ 'msg' => 'Cannot get product by id']);
      }
    }
  }
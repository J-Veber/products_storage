<?php

  class List_Controller extends Controller
  {
    function action_index()
    {
      $products = new Product($this->entity_manager);

      $var = [
        'products' => $products->getAllProducts()
      ];
      $this->fenom->display("list.tpl", $var);
    }

    public function action_delete($request)
    {
      $product = new Product($this->entity_manager);
      $product->deleteProduct($request['id']);
    }

    public function editProduct()
    {

    }

    public function getProduct()
    {

    }

    public function createProduct()
    {

    }
  }
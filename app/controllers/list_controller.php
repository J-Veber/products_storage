<?php

  class List_Controller extends Controller
  {
    public $var = [];
    function action_index()
    {
      $product = new Product($this->entity_manager);
      $this->displayAllProducts($product);
    }

    public function action_delete()
    {
      $data = json_decode(file_get_contents('php://input'), true);
      $product = new Product($this->entity_manager);
      $product->deleteProduct($data['id']);
      $this->var = [
        'products' => $product->getAllProducts()
      ];
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

    private function displayAllProducts($product) {
      $this->var = [
        'products' => $product->getAllProducts()
      ];
      $this->fenom->display("list.tpl", $this->var);
    }
  }
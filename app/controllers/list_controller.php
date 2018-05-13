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

    public function editProduct()
    {

    }

    public function deleteProduct()
    {

    }

    public function getProduct()
    {

    }

    public function createProduct()
    {

    }
  }
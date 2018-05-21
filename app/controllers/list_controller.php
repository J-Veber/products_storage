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

    public function action_delete()
    {
      echo 'delete action';
      echo $_REQUEST['id'];
//      $product = new Product($this->entity_manager);
//      $product->deleteProduct($_POST['id']);
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
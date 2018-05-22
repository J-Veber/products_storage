<?php

  class Edit_Controller extends Controller
  {
    public $var = [];

    function action_index()
    {
      $data = json_decode(file_get_contents('php://input'), true);
      var_dump($data);
      var_dump($_POST);
      if (!!$data['id']) {
        $product = new Product($this->entity_manager);
        $this->var = [
          'products' => $product->getProductById($data['id'])
        ];
        $this->fenom->display("edit.tpl", $this->var);
      } else {
        $this->fenom->display('error.tpl', []);
      }
    }
  }
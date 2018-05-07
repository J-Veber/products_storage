<?php

  class List_Controller extends Controller
  {
    function action_index() {
        $vars = array(
            'test' => 'Hello'
        );
        $this->fenom->display("list.tpl", $vars);
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
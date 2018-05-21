<?php

  class Edit_Controller extends Controller
  {
    function action_index()
    {
      if (isset($_POST['name']) && isset($_POST['price'])) {

        $vars = [
          'name' => $_POST['name'],
          'producer' => $_POST['producer'],
          'price' => (int)$_POST['price'],
          'country' => $_POST['country']
        ];

        $this->fenom->display("edit.tpl", $vars);
      }
      else {
        $this->fenom->display('error.tpl', []);
      }
    }
  }
<?php

  class NotFound_Controller extends Controller {

    function action_index($product_id = NULL)
    {
      $this->fenom->display('404.tpl', []);
    }
  }
<?php

  class NotFound_Controller extends Controller {

    function action_index()
    {
      $this->fenom->display('404.tpl', []);
    }
  }
<?php

  class New_Controller extends Controller {
    function action_index() {
        $vars = array(
            'test' => 'Hello'
        );
        $this->fenom->display("new.tpl", $vars);
    }
  }
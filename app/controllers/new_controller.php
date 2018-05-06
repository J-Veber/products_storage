<?php

  class New_Controller extends Controller {
    function action_index() {
      $this->view->generate('new_view.php', 'template_view.php');
    }
  }
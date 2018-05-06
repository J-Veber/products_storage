<?php

  class Edit_Controller extends Controller
  {
    function action_index()
    {
      $this->view->generate('edit_view.php', 'template_view.php');
    }
  }
<?php

class Edit_Controller extends Controller
{
    function action_index()
    {
        $vars = array(
            'test' => 'Hello'
        );
        $this->fenom->display("edit.tpl", $vars);
    }
}
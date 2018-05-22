<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

class Controller
{

  public $model;
  public $view;
  public $fenom;
  protected $entity_manager;

  public function __construct($entity_manager)
  {
    $this->fenom = new Fenom(new Fenom\Provider($_SERVER['DOCUMENT_ROOT'] . '/app/templates'));
    $this->fenom->setCompileDir($_SERVER['DOCUMENT_ROOT'] . '/app/templates/cache');
    $this->fenom->setOptions(array(
      'auto_reload' => true
    ));
    $this->entity_manager = $entity_manager;
  }

  public function action_index()
  {

  }
}
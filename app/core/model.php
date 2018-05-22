<?php

  class Model {

    protected $entity_manager;

    public function __construct($entity_manager)
    {
      $this->entity_manager = $entity_manager;
    }

  }
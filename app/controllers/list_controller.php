<?php

  class List_Controller extends Controller
  {
    function action_index()
    {
      $productRepository = $this->entity_manager->getRepository('Product');
      $products = $productRepository->findAll();

      foreach ($products as $product) {
        echo sprintf("-%s\n", $product->getId() . $product->getProducer() . $product->getName() . $product->getCountry());
      }
      $this->fenom->display("list.tpl", $products);
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
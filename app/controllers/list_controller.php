<?php

  class List_Controller extends Controller
  {
    public $var = [];
    public $product;

    public function __construct($entity_manager)
    {
      parent::__construct($entity_manager);
      $this->product = new Product($this->entity_manager);
    }

    public function action_index($product_id = null)
    {
      $this->displayAllProducts();
    }

    public function action_delete()
    {
      $data = json_decode(file_get_contents('php://input'), true);
      $this->product = new Product($this->entity_manager);
      $this->product->deleteProduct((int)$data['id']);
    }

    public function action_all() {
      $products = $this->getAllProducts();
      $response = [];
      foreach ( $products as $product ) {
        array_push($response,
          (object) array(
            'id' => $product->getId(),
            'name' => $product->getName(),
            'country' => $product->getCountry(),
            'producer' => $product->getProducer(),
            'expiration_date' => $product->getExpirationDate(),
            'price' => $product->getPrice()
          )
        );
      }
      echo json_encode($response);
    }

    private function getAllProducts() {
      return $this->product->getAllProducts();
    }

    private function displayAllProducts() {
      $this->var = [
        'products' => $this->getAllProducts()
      ];
      $this->fenom->display("list.tpl", $this->var);
    }
  }
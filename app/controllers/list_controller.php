<?php
use Doctrine\ORM\Query\ResultSetMapping;

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

    public function action_search()
    {
      $data = parent::getPhpInputParameter();

      $products = $this->product->getFilteredProducts($data['searchValue']);

      $this->sendProductsToClient($products);
    }

    public function action_delete()
    {
      $data = parent::getPhpInputParameter();
      $this->product = new Product($this->entity_manager);
      $this->product->deleteProduct((int)$data['id']);
    }

    public function action_all() {
      $products = $this->getAllProducts();
      $this->sendProductsToClient($products);
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

    private function sendProductsToClient($products) {
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
  }
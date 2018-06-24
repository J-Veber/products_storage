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
      $searchKeys = mb_split(' ', $data['searchValue']);
      $products = [];

      foreach ( $searchKeys as $searchKey ) {

        $query = $this->entity_manager->createQueryBuilder();
        $a = $query
          ->select('u')
          ->from('Product', 'u')
          ->where("u.id LIKE '%" . $searchKey . "%' 
          OR u.name LIKE '%" . $searchKey . "%' OR u.producer LIKE '%" . $searchKey . "%'
          OR u.country LIKE '%" . $searchKey . "%' OR u.price LIKE '%" . $searchKey . "%'
          OR u.expiration_date LIKE '%" . $searchKey . "%'");
        $queryProducts = $a->getQuery()->getResult();
        foreach ($queryProducts as $queryProduct) {
          if (!in_array($queryProduct, $products)) {
            array_push($products, $queryProduct);
          }
        }
      }
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
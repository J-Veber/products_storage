<?php
  /**
   * @Entity
   * @Table(name="products_storage")
   **/
  class Product extends Model
  {
    /** @Id
     *  @Primary_key
     *  @Column(type="integer")
     *  @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /** @Column(type="string")**/
    protected $name;

    /** @Column(type="string")**/
    protected $producer;

    /** @Column(type="string")**/
    protected $country;

    /** @Column(type="float")**/
    protected $price;

    /** @Column(type="datetime")**/
    protected $expiration_date;

    private $productRepository;
    private $timeFormat = 'd/m/Y';

    public function __construct($entity_manager)
    {
      parent::__construct($entity_manager);
      $this->productRepository = $this->entity_manager->getRepository('Product');
    }

    public function getAllProducts(): array {
      $products = $this->productRepository->findAll();
      return $products;
    }

    public function getProductById($product_id): array {
      return $this->productRepository->findBy(array('id' => $product_id));
    }

    public function createProduct($newProduct) {
      if ($newProduct instanceof Product){
        $this->entity_manager->persist($newProduct);
        $this->entity_manager->flush();
      } else {
        throw new Error('invalid input parameters');
      }
    }

    public function updateProduct($product) {
      if ($product instanceof Product){
        $this->entity_manager->flush();
      } else {
        throw new Error('invalid input parameters in productModel->updateProduct');
      }
    }

    public function deleteProduct($id) {
      if (is_int($id)) {
        $product = $this->productRepository->find($id);
        echo 'try to remove product ' . $product->getName();
        $this->entity_manager->remove($product);
        $this->entity_manager->flush();
      } else {
        throw new Error('invalid input parameters in productModel->deleteProduct');
      }
    }

    /**
     *  =====================================
     *    GETTERS AND SETTERS METHODS
     *  =====================================
     */

    public function setId($id)
    {
      $this->id = $id;
    }

    public function getId() {
      return $this->id;
    }

    public function setName($name)
    {
      if (is_string($name)) {
        $this->name = $name;
      } else {
        throw new Error('invalid input parameters in productModel->setName');
      }
    }

    public function getName()
    {
      return $this->name;
    }

    public function setProducer($producer)
    {
      if (is_string($producer)) {
        $this->producer = $producer;
      } else {
        throw new Error('invalid input parameters in productModel->setProducer');
      }
    }

    public function getProducer()
    {
      return $this->producer;
    }

    public function setCountry($country)
    {
      if (is_string($country)) {
        $this->country = $country;
      } else {
        throw new Error('invalid input parameters in productModel->setCountry');
      }
    }

    public function getCountry()
    {
      return $this->country;
    }

    public function setPrice($price)
    {
      if (is_int($price)) {
        $this->price = $price;
      } else {
        throw new Error('invalid input parameters in productModel->setPrice');
      }
    }

    public function getPrice()
    {
      return $this->price;
    }

    public function setExpirationDate($expiration_date)
    {
      if ($expiration_date instanceof DateTime) {
        $this->expiration_date = $expiration_date;
      } else if ($expiration_date === null) {
        $date = DateTime::createFromFormat( $this->timeFormat, date($this->timeFormat));
        if(!!$date) {
          $this->expiration_date = $date;
        }
      } else {
        throw new Error('invalid input parameters in productModel->setExpirationDate');
      }
    }

    public function getExpirationDate()
    {
      return $this->expiration_date;
    }
  }
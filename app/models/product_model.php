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

    /** @Column(type="integer")**/
    protected $price;

    /** @Column(type="datetime")**/
    protected $expiration_date;

    private $productRepository;

    public function __construct($entity_manager)
    {
      parent::__construct($entity_manager);
      $this->productRepository = $this->entity_manager->getRepository('Product');
    }

    public function getAllProducts(): array {
      $products = $this->productRepository->findAll();
      return $products;
    }

    public function createProduct($newProduct) {
      if ($newProduct instanceof Product){
        $this->entity_manager->persist($newProduct);
        $this->entity_manager->flush();
      } else {
        throw new Error('invalid input parameters');
      }
    }

    public function deleteProduct($id) {
      $product = $this->productRepository->find($id);
      echo 'try to remove product ' . $product->getName();
      $this->entity_manager->remove($product);
      $this->entity_manager->flush();
    }
    /**
     *  =====================================
     *    GETTERS AND SETTERS METHODS
     *  =====================================
     */
    public function getId() {
      return $this->id;
    }
    public function setName($name)
    {
      $this->name = $name;
    }

    public function getName()
    {
      return $this->name;
    }

    public function setProducer($producer)
    {
      $this->producer = $producer;
    }

    public function getProducer()
    {
      return $this->producer;
    }

    public function setCountry($country)
    {
      $this->country = $country;
    }

    public function getCountry()
    {
      return $this->country;
    }

    public function setPrice($price)
    {
      $this->price = $price;
    }

    public function getPrice()
    {
      return $this->price;
    }

    public function setExpirationDate($expiration_date)
    {
      $this->expiration_date = $expiration_date;
    }

    public function getExpirationDate()
    {
      return $this->expiration_date;
    }
  }
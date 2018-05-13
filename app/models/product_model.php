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

    public function getAllProducts(): array {
      $productRepository = $this->entity_manager->getRepository('Product');
      $products = $productRepository->findAll();
      return $products;
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
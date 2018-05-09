<?php
  /**
   * @Entity @Table(name="products_storage")
   **/
  class Product
  {
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /**@Id @Column(type="string")**/
    protected $name;
    /**@Column(type="string")**/
    protected $producer;
    /**@Id @Column(type="string")**/
    protected $country;
    /**@Column(type="number")**/
    protected $price;
    /**@Column(type="date")**/
    protected $expiration_date;

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
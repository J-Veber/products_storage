<?php

  class Edit_Controller extends Controller
  {
    public $var = [];
    public $productId;

    function action_index()
    {
      if (!!$_GET['product_id']) {
        $this->productId = $_GET['product_id'];
        $product = new Product($this->entity_manager);
        //TODO: повесить обработчик на вывод error page
        $productResponse = $product->getProductById($_GET['product_id']);
        $product->setId($_GET['product_id']);
        $product->setName($productResponse[0]->getName());
        $product->setProducer($productResponse[0]->getProducer());
        $product->setPrice((int)$productResponse[0]->getPrice());
        $product->setCountry($productResponse[0]->getCountry());
        $product->setExpirationDate($productResponse[0]->getExpirationDate());

        if (count($productResponse) > 1) {
          $this->fenom->display('error.tpl',
            [ 'msg' => 'DB has ' + count($productResponse) + ' record with same id']);
        } else {
          $this->var = [
            'product' => $product
          ];
        }
        $this->fenom->display("edit.tpl", $this->var);
      } else {
        $this->fenom->display('error.tpl',
          [ 'msg' => 'Cannot get product by id']);
      }
    }

    function action_save() {
      if (isset( $_POST['name']) && isset( $_POST['price'])) {
        $product = new Product($this->entity_manager);
        $receivedProduct = $product->getProductById($_POST['id'])[0];
        $receivedProduct->setName($_POST['name']);
        $receivedProduct->setProducer($_POST['producer']);
        $receivedProduct->setPrice((int)$_POST['price']);
        $receivedProduct->setCountry($_POST['country']);
        $receivedProduct->setExpirationDate(DateTime::createFromFormat('d/m/Y', $_POST['expiration_date']));

        if (strlen($receivedProduct->getName()) > 0 && strlen($receivedProduct->getPrice()) > 0
            && (int)$receivedProduct->getPrice() >= 0) {
          $product->updateProduct($receivedProduct);
          header('Location: /list');
        }
      }
    }
  }
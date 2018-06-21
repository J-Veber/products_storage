<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."\models"), $isDevMode);
$conn = array(
  'driver'   => 'mysqli',
  'user'     => 'root',
  'password' => 'passw',
  'dbname'   => 'products_storage',
  'host'     => 'localhost',
  'port'     => '3306',
);

$entityManager = EntityManager::create($conn, $config);
$router = new Route($entityManager);
$router->start();
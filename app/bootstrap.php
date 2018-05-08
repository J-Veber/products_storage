<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/app/models"), $isDevMode);
$conn = array(
  'driver'   => 'mysqli',
  'user'     => 'user',
  'password' => 'passw',
  'dbname'   => 'products',
  'host'     => 'localhost',
  'port'     => '8000',
);

$entityManager = EntityManager::create($conn, $config);
$router = new Route($entityManager);
$router->start();
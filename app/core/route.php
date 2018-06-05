<?php

class Route
{

  function __construct($entityManager)
  {
    $this->entityManager = $entityManager;
  }

  function start()
  {
    $model = 'Product';
    $controller_name = 'List';
    $action_name = 'index';
    $action_parameter = '';

    $routes = explode('/', $_SERVER['REQUEST_URI']);
//    var_dump($routes);

    if (!empty($routes[1])) {
      $controller_name = $routes[1];
    }
    if (!empty($routes[2])) {
      if (!!is_numeric($routes[2])) {
        $action_parameter = $routes[2];
      } else {
        $action_name = $routes[2];
      }
    }

    $model_name = $model . '_Model';
    $controller_name = $controller_name . '_Controller';
    $action_name = 'action_' . $action_name;

    $model_file = strtolower($model_name) . '.php';
    $model_path = 'app/models/' . $model_file;

    if (file_exists($model_path)) {
      include $model_path;
    }

    $controller_file = strtolower($controller_name) . '.php';
    $controller_path = 'app/controllers/' . $controller_file;
    if (!!file_exists($controller_path)) {
      include $controller_path;
      if (strtolower($controller_name) === '404_controller') {
        $controller_name = 'NotFound_Controller';
      }
      $controller = new $controller_name($this->entityManager);
      $action = $action_name;

//      if (method_exists($controller, $action($action_parameter))) {
//        if (strlen($action_parameter) > 0) {
//          $controller->$action($action_parameter);
//        } else {
//          $controller->$action(null);
//        }
//      } else {
//        $this->ErrorPage404();
//      }
      if (strlen($action_parameter) > 0) {
        $controller->$action($action_parameter);
      } else {
        $controller->$action(null);
      }
    } else {
      $this->ErrorPage404();
    }

  }

  private function ErrorPage404()
  {
    $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
    header('HTTP/1.1 404 Not Found');
    header('Status: 404 Not Found');
    header('Location: ' . $host . '404');
  }
}
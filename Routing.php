<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/ErrorController.php';
require_once 'src/controllers/ProjectController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/MapController.php';

class Routing {

  // Tablica przechowująca zdefiniowane trasy (url => kontroler)
  public static $routes;

  // Metoda do dodawania tras
  public static function get($url, $view) {
    self::$routes[$url] = $view;
  }

  public static function post($url, $view) {
    self::$routes[$url] = $view;
  }


  public static function run($url) {
    $action = explode("/", $url)[0];


    if (!array_key_exists($action, self::$routes)) {
      // Ustaw akcję na 'error404', jeśli trasa nie istnieje
      $action = 'err404';

      $controller = 'ErrorController';
    } else {

      $controller = self::$routes[$action];
    }

    $object = new $controller;

    $action = $action ?: 'Main';

    if(!method_exists($object, $action)) {
      // Jeśli metoda nie istnieje, ustaw akcję na 'error404'
      $controller = 'ErrorController';
      $object = new $controller;
      $action = 'err404';
    }

    // Wywołaj akcję na obiekcie kontrolera
    $object->$action();

  }
}

<?php

// Importuj klasę DefaultController.php i ErrorController
require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/ErrorController.php';

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

  // Metoda do uruchamiania routingu na podstawie odczytanej ścieżki

  public static function run($url) {
    // Pobierz akcję z pierwszej części ścieżki URL
    $action = explode("/", $url)[0];

    // Sprawdź, czy istnieje taka trasa w zdefiniowanych trasach
    if (!array_key_exists($action, self::$routes)) {
      // Ustaw akcję na 'error404', jeśli trasa nie istnieje
      $action = 'err404';
      // Pobierz kontroler ErrorController
      $controller = 'ErrorController';
    } else {
      // Pobierz kontroler zdefiniowany dla danej trasy
      $controller = self::$routes[$action];
    }

    // Stwórz obiekt kontrolera
    $object = new $controller;

    // Domyślna akcja, jeśli nie została podana w ścieżce URL
    $action = $action ?: 'Main';

    // Sprawdź, czy metoda (akcja) istnieje w kontrolerze
    if(!method_exists($object, $action)) {
      // Jeśli metoda nie istnieje, ustaw akcję na 'error404'
      $controller = 'ErrorController';
      $object = new $controller;
      $action = 'err404';
    }

    // Wywołaj akcję na obiekcie kontrolera
    $object->$action();

  }

  // public static function run ($url) {
  //   // Pobierz akcję z pierwszej części ścieżki URL
  //   $action = explode("/", $url)[0];
  
  //   // Sprawdź, czy istnieje taka trasa w zdefiniowanych trasach
  //   if (!array_key_exists($action, self::$routes)) {
  //     die("Wrong url!");
  //     // TODO dodać przekierowanie na strone 404.html
  //     $action = 'err404';
  //     $object-≥$action = self::$routes[$action];
  //     //$action = err404(); //nie dziala
  //   }

  //   // Pobierz kontroler zdefiniowany dla danej trasy
  //   $controller = self::$routes[$action];

  //   // Stwórz obiekt kontrolera
  //   $object = new $controller;

  //   // Domyślna akcja, jeśli nie została podana w ścieżce URL
  //   $action = $action ?: 'Main';

  //   // Wywołaj akcję na obiekcie kontrolera
  //   $object->$action();
  // }
}

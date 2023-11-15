<?php

// Importuj klasę DefaultController.php
require_once 'src/controllers/DefaultController.php';

class Routing {

  // Tablica przechowująca zdefiniowane trasy (url => kontroler)
  public static $routes;

  // Metoda do dodawania tras
  public static function get($url, $view) {
    self::$routes[$url] = $view;
  }

  // Metoda do uruchamiania routingu na podstawie odczytanej ścieżki
  public static function run ($url) {
    // Pobierz akcję z pierwszej części ścieżki URL
    $action = explode("/", $url)[0];

    // Sprawdź, czy istnieje taka trasa w zdefiniowanych trasach
    if (!array_key_exists($action, self::$routes)) {
      print($url);
      die("Wrong url!");
    }

    // Pobierz kontroler zdefiniowany dla danej trasy
    $controller = self::$routes[$action];

    // Stwórz obiekt kontrolera
    $object = new $controller;

    // Domyślna akcja, jeśli nie została podana w ścieżce URL
    $action = $action ?: 'login';

    // Wywołaj akcję na obiekcie kontrolera
    $object->$action();
  }
}

<?php

// Wczytaj plik zawierający definicję klas i funkcji obsługujących routowanie
require 'Routing.php';

// Pobierz ścieżkę z żądania HTTP, usuń ewentualne znaki '/' z początku i końca
$path = trim($_SERVER['REQUEST_URI'], '/');
// Wyciągnij ścieżkę URL z parsowanej struktury URL
$path = parse_url($path, PHP_URL_PATH);

// Skonfiguruj trasę dla pustej ścieżki URL oraz ścieżki '/students'
Routing::get('', 'DefaultController');
Routing::get('dashboard', 'DefaultController');

// Uruchom mechanizm routowania na podstawie odczytanej ścieżki
Routing::run($path);

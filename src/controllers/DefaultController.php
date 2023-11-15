<?php

// Importuje klasę AppController.php
require_once 'AppController.php';

class DefaultController extends AppController {

    // Metoda obsługująca żądanie dla ścieżki '/login'
    public function login()
    {
        // Wywołuje metodę render z klasy AppController, przekazując 'login' jako szablon widoku
        $this->render('login'); // nazwa strony html bez '.html'
    }

    // Metoda obsługująca żądanie dla ścieżki '/students'
    public function dashboard()
    {
        // Wywołuje metodę render z klasy AppController, przekazując 'dashboard' jako szablon widoku
        $this->render('dashboard');  // nazwa strony html bez '.html'
    }
}

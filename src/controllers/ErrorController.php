<?php

// Importuje klasę AppController.php
require_once 'AppController.php';

class ErrorController extends AppController {

    // Metoda obsługująca żądanie dla ścieżki '/404'
    public function err404()
    {
        $this->render('404'); // nazwa strony html bez '.html'
    }
}

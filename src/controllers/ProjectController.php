<?php

// Importuje klasę AppController.php
require_once 'AppController.php';

class ProjectController extends AppController {

    // Metoda obsługująca żądanie dla ścieżki '/404'
    public function newIncident()
    {
        $this->render('newIncident'); // nazwa strony html bez '.html'
    }
}
<?php

// Importuje klasę AppController.php
require_once 'AppController.php';
require_once __DIR__.'/../models/Dog.php';

class DefaultController extends AppController {

    // Metoda obsługująca żądanie dla ścieżki '/login'
    public function login()
    {
        if($this->isGet())
        {
            return $this->render('login'); // nazwa strony html bez '.html'
        }

        die("Form Send");
    }

    // Metoda obsługująca żądanie dla ścieżki '/students'
    public function dashboard()
    {
        $dog1 = new Dog("Buddy", "Golden Retriever", 3, "Golden", "https://example.com/dog1_photo.jpg");
        $dog2 = new Dog("Max", "Labrador", 4, "Yellow", "https://example.com/dog2_photo.jpg");
        $dog3 = new Dog("Charlie", "Beagle", 2, "Tricolor", "https://example.com/dog3_photo.jpg");
        $dog4 = new Dog("Lucy", "Poodle", 5, "White", "https://example.com/dog4_photo.jpg");
        $dog5 = new Dog("Rocky", "German Shepherd", 6, "Sable", "https://example.com/dog5_photo.jpg");

        // Creating a list of 5 dogs
        $dogs = [$dog1,$dog2,$dog3,$dog4,$dog5];

        // Wywołuje metodę render z klasy AppController, przekazując 'dashboard' jako szablon widoku
        $this->render('dashboard', ["dogs" => $dogs]);  // nazwa strony html bez '.html'
    }
}

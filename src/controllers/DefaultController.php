<?php

// Importuje klasę AppController.php
require_once 'AppController.php';
require_once __DIR__.'/../models/Dog.php';

//TODO zrobic fetchapi i endpointy lab14 bitbucket

class DefaultController extends AppController {

    public function Main()
    {
        $this->render("Main");
    }

    // Metoda obsługująca żądanie dla ścieżki '/login'
    public function login()
    {
        if($this->isGet())
        {
            return $this->render('login'); // nazwa strony html bez '.html'
        }
        if($this->isPost())
        {
            die("Form Send");
        }
    }

    public function index() {
        $this->render("login");
     } 

    // Metoda obsługująca żądanie dla ścieżki '/students'
    public function dashboard()
    {
        $this->render("dashboard", [
            "title" => "Hello on my dashboard", 
            "dogs" => $this->dogsRepository->getDogs()
        ]);
    }

    public function register()
    {
        if($this->isGet())
        {
            return $this->render('register'); // nazwa strony html bez '.html'
        }
        if($this->isPost())
        {
            die("Form Send");
        }
    }
}

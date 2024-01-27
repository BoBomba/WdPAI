<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController {
    public function login() {
        // Utwórz użytkownika dla celów testowych
        $user = new User('jankowaliski@gmail.com', 'admin', 'jan', 'kowalski');
        
        if ($this->isPost()) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            
            if ($user->getEmail() !== $email) {
                return $this->render('/login', ['messages' => ['User does not exist!']]);
            }

            if ($user->getPassword() !== $password) {
                return $this->render('/login', ['messages' => ['Wrong password!']]);
            }

            // Użytkownik został zweryfikowany, przekieruj na '/dashboard'
            $url = "http://" . $_SERVER['HTTP_HOST'];
            header("Location: " . $url . "/dashboard");
            exit();
        }

        // Jeśli formularz nie został przesłany metodą POST, wyświetl stronę logowania
        return $this->render('/login', ['messages' => []]);
    }
}


?>
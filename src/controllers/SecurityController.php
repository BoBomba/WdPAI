<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController {

    private $messages = [];
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


    public function register() {

        if ($this->isPost()) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password']; // TODO zahashować hasła
            $repeated_password = $_POST['repeated_password'];

            if (empty($name)) {
                $this->messages[] = 'Imie jest wymagane.<br>';
            }
            if (empty($surname)) {
                $this->messages[] = 'Nazwisko jest wymagane.<br>';
            }
            if (empty($email)) {
                $this->messages[] = 'Email jest wymagany.<br>';
            }
            if (empty($password)) {
                $this->messages[] = 'Hasło jest wymagane.<br>';
            }
            if ($password !== $repeated_password) {
                $this->messages[] = 'Hasła się nie zgadzają.<br>';
            }

            // Tworzenie nowego użytkownika
            $user = new User($email, $password, $name, $surname, 'normalUser');

            // TODO: Zapisz użytkownika do bazy danych

            if (!empty($this->messages)) {
                return $this->render('register', ['messages' => $this->messages]);
            }

            // Przekierowanie na stronę logowania lub dashboard
            return $this->render('/login', ['messages' => ['Rejestracja zakończona sukcesem']]);
        }

        // Wyświetlanie formularza rejestracji, jeśli metoda nie jest POST
        return $this->render('register', ['messages' => []]);
    }
}


?>
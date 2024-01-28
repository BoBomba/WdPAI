<?php
session_start();

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class SecurityController extends AppController
{

    private $messages = [];
    public function login()
    {

        $userRepository = new UserRepository();

        // Utwórz użytkownika dla celów testowych
//        $user = new User('jankowaliski@gmail.com', password_hash('admin',PASSWORD_DEFAULT), 'jan', 'kowalski');

        if ($this->isPost()) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $user = $userRepository->getUser($email);

//            sprawdzenie uzytkownika
//            var_dump($user);

            if ($user !== NULL && password_verify($password, $user->getPassword())) {
                // Użytkownik jest zalogowany, ustawienie zmiennych sesji
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['logged_in'] = true;
                $_SESSION['name'] = $user->getName();
                $_SESSION['surname'] = $user->getSurname();

                //var_dump($_SESSION);

                // Przekierowanie na dashboard lub inną stronę
                // return $this->render('dashboard');
                $url = "http://" . $_SERVER['HTTP_HOST'];
                header("Location: " . $url . "/dashboard");
                exit();
            } else {
                // Logika, jeśli dane logowania są nieprawidłowe
                // Można dodać komunikat o błędzie
                $this->messages[] = 'Nieprawidłowy email lub hasło';
                return $this->render('login', ['messages' => $this->messages]);
            }

            
        }

        // Jeśli formularz nie został przesłany metodą POST, wyświetl stronę logowania
        return $this->render('/login', ['messages' => []]);
    }


    public function register()
    {

        if ($this->isPost()) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password']; 
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
            if (empty($repeated_password)) {
                $this->messages[] = 'Powtórzone hasło jest wymagane.<br>';
            }
            if ($password !== $repeated_password) {
                $this->messages[] = 'Hasła się nie zgadzają.<br>';
            }

            $userRepo = new UserRepository();
            if ($userRepo->getUser($email) !== null) {
                $this->messages[] = 'Użytkownik z tym adresem email już istnieje.<br>';
            }

            // Tworzenie nowego użytkownika do celow testowych
            //$user = new User($email, password_hash($password, PASSWORD_DEFAULT), $name, $surname);

            if (!empty($this->messages)) {
                return $this->render('register', ['messages' => $this->messages]);
            }

            $userID = uniqid();

            //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $userType = 'normalUser'; // Domyślny typ użytkownika

            $userRepo->addUser($userID, $email, $password, $name, $surname, $userType);

            // Przekierowanie na stronę logowania lub dashboard
            return $this->render('/login', ['messages' => ['Rejestracja zakończona sukcesem']]);
        }

        // Wyświetlanie formularza rejestracji, jeśli metoda nie jest POST
        return $this->render('register', ['messages' => []]);
    }

    public function logout()
    {
        // Usunięcie zmiennych sesji
        session_unset();

        // Zniszczenie sesji
        session_destroy();

        $_SESSION['logout'] = true;

        return $this->render('Main');

    }
}


?>
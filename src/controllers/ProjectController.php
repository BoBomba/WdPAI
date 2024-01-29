<?php
session_start();

require_once 'AppController.php';
require_once __DIR__.'/../models/Incident.php';
require_once __DIR__.'/../repository/MapRepository.php';

class ProjectController extends AppController
{

    const MAX_FILE_SIZE = 1024 * 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    public function newIncident()
    {
        $this->render('newIncident'); // nazwa strony html bez '.html'
    }

    private function validate(array $file): bool
    {

        if($file['size'] > self::MAX_FILE_SIZE){ 
            $this->messages[] = 'Plik jest zbyt duzy';
            return false;
        }

        if(!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)){
            $this->messages[] = 'Plik nie jest zdjęciem png lub jpeg';
            return false;
        }

        return true;

    }

    public function addIncident()
{
    if ($this->isPost()) {

        if (!isset($_SESSION['user_id'])) {
            $this->messages[] = 'Błąd autoryzacji użytkownika.';
            return $this->render('newIncident', ['messages' => $this->messages]);
        }
        //walidacje
        if (empty($_POST['title'])) {
            $this->messages[] = 'Tytuł jest wymagany.<br>';
        }
        if (empty($_POST['description'])) {
            $this->messages[] = 'Opis jest wymagany.<br>';
        }
        if (empty($_POST['longitude'])) {
            $this->messages[] = 'Długość geograficzna jest wymagana.<br>';
        }
        if (empty($_POST['latitude'])) {
            $this->messages[] = 'Szerokość geograficzna jest wymagana.<br>';
        }

        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            // Walidacja pliku
            if (!$this->validate($_FILES['file'])) {
                $this->messages[] = 'Błąd przesyłania pliku.<br>';
            }
        }

        // Jeśli są błędy, ponownie wyświetl formularz z komunikatami
        if (!empty($this->messages)) {
            return $this->render('newIncident', ['messages' => $this->messages]);
        }

//        // Logika przenoszenia pliku i inne operacje po pomyślnej walidacji
//        move_uploaded_file(
//            $_FILES['file']['tmp_name'],
//            dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
//        );



        $status = true;

        $time = date('Y-m-d H:i:s');

        $location = '{"point": ['.$_POST['longitude'].', '.$_POST['latitude'].']}';

        $incident = new MapRepository();

        $userId = $_SESSION['user_id'];

        //$incidentid = uniqid();
        //$incident = new Incident($incidentid, $_POST['title'], $_POST['description'], $_POST['location'], $time ,$_FILES['file']['name'], $_POST['user']);

        $incident->pushIncident($_POST['title'], $_POST['description'], $location, $time , $userId, $_FILES['file']['name']);

        // Ustaw flagę sukcesu w sesji
        $_SESSION['incident_added'] = true;


        // Przekieruj na dashboard
        return $this->render('/dashboard');
    }

    $this->render('newIncident');
}

}
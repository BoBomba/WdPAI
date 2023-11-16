<?php

class AppController {

    private $request;

    public function __construct()
    {
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isGet(): bool
    {
        return $this->request === 'GET';
    }

    protected function isPost(): bool
    {
        return $this->request === 'POST';
    }

    // Metoda renderująca widok na podstawie szablonu i zmiennych
    protected function render(string $template = null, array $variables = [])
    {
        // Ścieżka do szablonu widoku
        $templatePath = 'src/views/' . $template . '.php';
        
        // Domyślna wartość dla przypadku, gdy plik szablonu nie zostanie znaleziony
        $output = 'File not found';

        // Sprawdź, czy plik szablonu istnieje
        if (file_exists($templatePath)) {
            // Ekstraktuj zmienne, aby były dostępne wewnątrz szablonu
            extract($variables);
            
            // Uruchom buforowanie wyjścia, aby przechwycić zawartość pliku szablonu
            ob_start();
            include $templatePath;
            
            // Pobierz zawartość bufora i wyczyść bufor
            $output = ob_get_clean();
        }
        
        // Wyświetl zawartość szablonu lub komunikat o błędzie, jeśli plik nie został znaleziony
        print $output;
    }
}

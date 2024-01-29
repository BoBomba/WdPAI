<?php

require_once 'Repository.php';

class MapRepository extends Repository
{
    public function getIncidents(): array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM schema.incidents;
        ');
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);;
    }

    public function pushIncident($title, $description, $location, $time, $author,$file)
    {

        if ($file) {
            if (is_array($file) && $file['error'] === UPLOAD_ERR_OK) {
                // Przetwarzanie pliku
                $fileData = file_get_contents($file['tmp_name']);
            }

            try {
                $stmt = $this->database->connect()->prepare('
            INSERT INTO schema.incidents (title, description, location, time, author, file)
            VALUES (:title, :description, :location, :time, :author, :file_data)
        ');

                $stmt->bindParam(':title', $title, PDO::PARAM_STR);
                $stmt->bindParam(':description', $description, PDO::PARAM_STR);
                $stmt->bindParam(':location', $location, PDO::PARAM_STR);
                $stmt->bindParam(':time', $time, PDO::PARAM_STR);
                $stmt->bindParam(':author', $author, PDO::PARAM_INT);
                $stmt->bindParam(':file_data', $fileData, PDO::PARAM_LOB);

                $stmt->execute();
            }
            catch (PDOException $e) {
                error_log('Error: ' . $e->getMessage());
            }
        }
        else {
            try {
                $stmt = $this->database->connect()->prepare('
    INSERT INTO schema.incidents (title, decription, location, time, author)
    VALUES (:title, :decription, :location, :time, :author)
');

                $stmt->bindParam(':title', $title, PDO::PARAM_STR);
                $stmt->bindParam(':decription', $description, PDO::PARAM_STR);
                $stmt->bindParam(':location', $location, PDO::PARAM_STR);
                $stmt->bindParam(':time', $time, PDO::PARAM_STR);
                $stmt->bindParam(':author', $author, PDO::PARAM_STR);

                $stmt->execute();
            } catch (PDOException $e) {
                error_log('Error: ' . $e->getMessage());
            }
        }
    }
}

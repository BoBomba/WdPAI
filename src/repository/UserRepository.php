<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM schema.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['user_id'],
            $user['name'],
            $user['surname'],
            $user['email'],
            $user['password'],
            $user['usertype']
        );
    }

    public function getUsername(string $user_id): ?string
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM schema.users WHERE user_id = :user_id
        ');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return $user['name']." ".$user['surname'];

    }

    public function addUser($id ,$email, $password, $name, $surname, $usertype)
    {
      try {
        $stmt = $this->database->connect()->prepare('
    INSERT INTO schema.users (user_id, name, surname, email, password, usertype)
    VALUES (:id, :name, :surname, :email, :password, :usertype)
');

            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':usertype', $usertype, PDO::PARAM_STR);

            // Haszowanie hasła przed zapisem do bazy danych
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindValue(':password', $hashedPassword, PDO::PARAM_STR);

            $stmt->execute();
        }
        catch (PDOException $e)
        {
            error_log('Error: ' . $e->getMessage());
        }
    }
}
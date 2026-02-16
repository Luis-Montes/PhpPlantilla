<?php
require_once __DIR__ . '/database.php';

class User
{
    public static function findByEmail($email_user)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE email_user = :email_user");
        $stmt->bindParam(":email_user", $email_user);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($name_user, $email_user, $password_user)
    {


        try {
            $db = Database::connect();
            $stmt = $db->prepare("INSERT INTO users(name_user, email_user, password_user) VALUES (:name_user, :email_user, :password_user)");
            $stmt->bindParam(":name_user", $name_user);
            $stmt->bindParam(":email_user", $email_user);
            $stmt->bindParam(":password_user", $password_user);
            return $stmt->execute();
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // Código de error para violación de clave única
                return "duplicate";
            }
            return false;
        }
    }
}

<?php
require_once __DIR__ . '/database.php';

class Persona
{
    public static function getPersonas()
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM personas");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($name_persona, $lastname_user, $email_user, $naphone_personame, $address_persona, $birth_date_persona)
    {
        try {
            $db = Database::connect();
            $stmt = $db->prepare("INSERT INTO personas(name_persona, lastname_user, email_user, phone_persona, address_persona, birth_date_persona) VALUES (:name_persona, :lastname_user, :email_user, :phone_persona, :address_persona, :birth_date_persona)");
            $stmt->bindParam(":name_persona", $name_persona);
            $stmt->bindParam(":lastname_user", $lastname_user);
            $stmt->bindParam(":email_user", $email_user);
            $stmt->bindParam(":phone_persona", $naphone_personame);
            $stmt->bindParam(":address_persona", $address_persona);
            $stmt->bindParam(":birth_date_persona", $birth_date_persona);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
}

?>
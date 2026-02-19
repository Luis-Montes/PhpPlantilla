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
}

?>
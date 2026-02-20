<?php
require_once __DIR__ . '/../Models/Persona.php';

class PersonaController
{
    public static function index()
    {
        $personas = Persona::getPersonas();
        return $personas;
    }

    public static function create()
    {
        $name_persona = $_POST["name_persona"];
        $lastname_user = $_POST["lastname_user"];
        $email_user = $_POST["email_user"];
        $naphone_personame = $_POST["phone_persona"];
        $address_persona = $_POST["address_persona"];
        $birth_date_persona = $_POST["birth_date_persona"];

        $result = Persona::create($name_persona, $lastname_user, $email_user, $naphone_personame, $address_persona, $birth_date_persona);
        if ($result === true)
        {
            header("Location: admin");
            exit();
        } else {
            return "error";
        }
        
    }
}
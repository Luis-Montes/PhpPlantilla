<?php
require_once __DIR__ . '/../Models/Persona.php';

class PersonaController
{
    public static function index()
    {
        $personas = Persona::getPersonas();
        return $personas;
    }
}
<?php

class ModificarModel
{

    private $database;
    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getPokemones()
    {
        return $this->database->query("SELECT imagen, nombre, tipo, numero_identificador FROM pokemon");
    }
}
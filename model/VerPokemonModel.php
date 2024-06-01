<?php

class VerPokemonModel
{

    private $database;
   private $id;

    public function __construct($database)
    {
        $this->database = $database;


    }


    public function getPokemonById($id)
    {
        // Preparar la consulta SQL para buscar un Pokémon por su ID

        $sql = "SELECT * FROM pokemon WHERE id = $id";

        // Ejecutar la consulta con el ID del Pokémon como parámetro
        return $this->database->query($sql);
    }

}
<?php

class BusquedaModel
{

    private $database;
    private $nombre_pokemon;

    public function __construct($database)
    {
        $this->database = $database;
        $this->nombre_pokemon = "";
    }
// le pasa el nombre dle pokemon
    public function setNombreBuscado($nombre)
    {
        $this->nombre_pokemon = $nombre;
    }

    public function getPokemones()
    {
        // Preparar la consulta SQL con un parámetro de búsqueda
        $sql = "SELECT * FROM pokemon WHERE nombre LIKE ?";

        // Ejecutar la consulta con el nombre del Pokémon como parámetro
        return $this->database->query($sql, ['%' . $this->nombre_pokemon . '%']);
    }
}
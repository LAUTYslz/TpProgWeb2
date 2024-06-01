<?php

class BusquedaModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getPokemones( $nombre)
    {


        // Si no se proporciona un ID pero se proporciona un nombre, buscar por nombre
        if ( !empty($nombre)) {

            $nombre = $this->database->escapeString($nombre);
            $sql = "SELECT * FROM pokemon WHERE nombre = '$nombre'";
        }

        // Ejecutar la consulta
        return $this->database->query($sql);
    }
}
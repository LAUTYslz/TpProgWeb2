<?php

class DarDeAltaController
{

    private $model;
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getPokemones()
    {
        $pokemones = $this->model->getPokemones();
        include_once("validaciones/darDeAltaPokemon.php");
    }
}
<?php

class DarDeBajaController
{

    private $model;
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function listPokemones()
    {
        $pokemones = $this->model->getPokemones();
        include_once("validaciones/darDeBajaPokemon.php");
    }
}
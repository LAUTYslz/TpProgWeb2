<?php

class DarDeBajaController
{

    private $model;
    private $presenter;

    public function __construct($model, $presenter)
    {
        $this->model = $model;
        $this->presenter = $presenter;
    }
    public function get()
    {
        $pokemones = $this->model->getPokemones();
        include_once("validaciones/darDeBajaPokemon.mustache");
    }
}
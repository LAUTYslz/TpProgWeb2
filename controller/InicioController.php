<?php

class InicioController
{
    private $model;
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getPokemones()
    {
        $pokemones = $this->model->getPokemones();
        include_once("inicio_view.php");
    }
}
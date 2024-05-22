<?php

class HomeController
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
        $this->presenter->render("view/home.mustache", ["pokemones" => $pokemones]);
    }
}
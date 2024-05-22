<?php

class BusquedaController
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
        // Obtener el nombre buscado desde la URL
        $nombrePokemonBuscado = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

        // Establecer el nombre buscado en el modelo
        $this->model->setNombreBuscado($nombrePokemonBuscado);

        // Obtener los Pokémon que coincidan con el nombre buscado
        $pokemones = $this->model->getPokemones();

        // Renderizar la vista con los resultados
        $this->presenter->render("view/busqueda.mustache", ["pokemones" => $pokemones]);

    }
}
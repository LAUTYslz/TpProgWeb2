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

    public function getBuscar()
    {
        if (isset($_GET["nombre"])) {
            $nombre = $_GET["nombre"];
            // Llamar al método del modelo para buscar por nombre
            $pokemones = $this->model->getPokemones( $nombre);
        $this->presenter->render("busqueda", ["pokemones" => $pokemones]);



    } else {
        echo "ID de Pokémon vacío.";
    }
}


}

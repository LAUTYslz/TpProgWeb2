<?php

class VerPokemonController
{

    private $model;
    private $presenter;

    public function __construct($model, $presenter)
    {
        $this->model = $model;
        $this->presenter = $presenter;
    }

    public function getVer()
    {
        if (isset($_GET["id"])) {
            $id_solicitado = $_GET["id"];
            // Asegúrate de que el ID no esté vacío antes de pasarlo al modelo
            if (!empty($id_solicitado)) {
                $pokemones = $this->model->getPokemonById($id_solicitado);
                $this->presenter->render("view/verPokemonView.mustache", ["pokemones" => $pokemones]);



            } else {
                echo "ID de Pokémon vacío.";
            }
        }

        }
}
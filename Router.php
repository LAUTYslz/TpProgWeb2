<?php

class Router
{

    public function __construct($controller, $action)
    {
    }

    public function route($controller, $action)
    {
        switch ($controller){

            case "home":
                $homeController = Configuration::getHomeController();
                $homeController->getPokemones();
                break;
            case "darDeAlta":
                $darDeAltaController = Configuration::getDarDeAltaController();
                $darDeAltaController->getPokemones();
                //include_once ("validaciones/darDeAltaPokemon.php");
                break;
            case "darDeBaja":
                $darDeBajaController = Configuration::getDarDeBajaController();
                $darDeBajaController->listPokemones();
                //include_once ("validaciones/darDeBajaPokemon.php");
                break;
            case "modificar":
                $modificarController = Configuration::getModificarController();
                $modificarController->listPokemones();
                //include_once ("validaciones/modificarPokemon.php");
                break;
            case "verPokemon":
                $verPokemonController = Configuration::getVerPokemonController();
                $verPokemonController ->listPokemones();
                //include_once ("pokemon.php");
                break;
            case "busqueda":
                $busquedaController = Configuration::getBusquedaController();
                $busquedaController->listpokemones();
                //include_once ("busqueda.php");
                break;
            default:
                $inicioController = Configuration::getInicioController();
                $inicioController->getPokemones();
                break;
        }
    }
}
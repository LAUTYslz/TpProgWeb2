<?php
//controlador
include_once ("controller/InicioController.php");
include_once ("controller/HomeController.php");
include_once ("controller/DarDeBajaController.php");
include_once ("controller/DarDeAltaController.php");
include_once ("controller/ModificarController.php");
include_once ("controller/BusquedaController.php");
include_once ("controller/VerPokemonController.php");
//modelos
include_once ("model/InicioModel.php");
include_once ("model/HomeModel.php");
include_once ("model/DarDeBajaModel.php");
include_once ("model/DarDeAltaModel.php");
include_once ("model/ModificarModel.php");
include_once ("model/BusquedaModel.php");
include_once ("model/VerPokemonModel.php");
//helper
include_once ("helper/Database.php");
include_once ("helper/Router.php");
include_once ("helper/Presenter.php");
include_once ("helper/MustachePresenter.php");

include_once('vendor/vendor/mustache/src/Mustache/Autoloader.php');
Class Configuration
{
    // CONTROLLERS--------------------------------------------------------------
    public static function getInicioController()
    {
        return new InicioController(self::getIncioModel() ,self::getPresenter());
    }

    public static function getHomeController()
    {
        return new HomeController(self::getHomeModel() , self:: getPresenter());
    }

    public static function getDarDeAltaController()
    {
        return new DarDeAltaController(self::getDarDeAltaModel(), self::getPresenter());
    }

    public static function getDarDeBajaController()
    {
        return new DarDeBajaController(self::getDarDeBajaModel(), self::getPresenter());
    }

    public static function getModificarController()
    {
        return new ModificarController(self::getModificarModel(), self::getPresenter());
    }

    public static function getVerPokemonController()
    {
        return new VerPokemonController(self::getVerPokemonModel(), self::getPresenter());

    }

    public static function getBusquedaController()
    {
        return new BusquedaController(self::getBusquedaModel(), self::getPresenter());

    }

    // MODELS-----------------------------------------------------------

    private static function getIncioModel()
    {
        return new InicioModel(self::getPokemonDatabase());
    }

    private static function getHomeModel()
    {
        return new HomeModel(self::getPokemonDatabase());
    }

    private static function getDarDeAltaModel()
    {
        return new DarDeAltaModel(self::getPokemonDatabase());
    }

    private static function getDarDeBajaModel()
    {
        return new DarDeBajaModel(self::getPokemonDatabase());
    }

    private static function getModificarModel()
    {
        return new ModificarModel(self::getPokemonDatabase());
    }

    private static function getVerPokemonModel()
    {
        return new VerPokemonModel(self::getPokemonDatabase());
    }

    private static function getBusquedaModel()
    {
        return new BusquedaModel(self::getPokemonDatabase());
    }

    // HELPERS-----------------------------------------------------------------------------
    public static function getPokemonDatabase()
    {
        $config = self::getConfig();
        $pokemonConfig = $config['pokemon'];
        return new Database($pokemonConfig["servername"], $pokemonConfig["username"], $pokemonConfig["password"], $pokemonConfig["database"]);
    }

    public static function getUsuarioDatabase()
    {
        $config = self::getConfig();
        $usuarioConfig = $config['usuario'];
        return new Database($usuarioConfig["servername"], $usuarioConfig["username"], $usuarioConfig["password"], $usuarioConfig["database"]);
    }

    private static function getConfig()
    {
        return parse_ini_file("config/config.ini",true);
    }

    public static function getRouter()
    {
        return new Router("getInicioController", "get");
    }

    private static function getPresenter()
    {
        return new MustachePresenter("view/template");
    }

}
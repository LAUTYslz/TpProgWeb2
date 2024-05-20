<?php
include_once ("config/config.ini");
include_once ("helper/Database.php");
include_once ("Router.php");

include_once ("validaciones/funcionTipo.php");

include_once ("controller/InicioController.php");
include_once ("controller/HomeController.php");
include_once ("controller/DarDeBajaController.php");
include_once ("controller/DarDeAltaController.php");
include_once ("controller/ModificarController.php");
include_once ("controller/BusquedaController.php");
include_once ("controller/VerPokemonController.php");

include_once ("model/InicioModel.php");
include_once ("model/HomeModel.php");
include_once ("model/DarDeBajaModel.php");
include_once ("model/DarDeAltaModel.php");
include_once ("model/ModificarModel.php");
include_once ("model/BusquedaModel.php");
include_once ("model/VerPokemonModel.php");
Class Configuration
{
    // CONTROLLERS--------------------------------------------------------------
    public static function getInicioController()
    {
        return new InicioController(self::getIncioModel());
    }

    public static function getHomeController()
    {
        return new HomeController(self::getHomeModel());
    }

    public static function getDarDeAltaController()
    {
        return new DarDeAltaController(self::getDarDeAltaModel());
    }

    public static function getDarDeBajaController()
    {
        return new DarDeBajaController(self::getDarDeBajaModel());
    }

    public static function getModificarController()
    {
        return new ModificarController(self::getModificarModel());
    }

    public static function getVerPokemonController()
    {
        return new VerPokemonController(self::getVerPokemonModel());

    }

    public static function getBusquedaController()
    {
        return new BusquedaController(self::getBusquedaModel());

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
        return new Router("getLaBandaController", "get");
    }

    private static function getPresenter()
    {
        return new MustachePresenter("view/template");
    }

}
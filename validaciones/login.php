<?php
session_start();
include_once("../helper/Database.php");
include_once ("../Configuration.php");

if(isset($_POST["usuario"]) && isset($_POST["pass"])){
    $usuario = trim($_POST["usuario"]);
    $pass = trim($_POST["pass"]);

    $esValido = validarUsuario($usuario,$pass);

    if ($esValido){
        $_SESSION["usuario"] = $usuario;
        $mensaje = urlencode("Usted ha ingresado en modo-Admin.");
        header("location:../index.php?mensaje=$mensaje&controller=home&action=getPokemones");
        exit();
    }else{
        $mensajeError = urlencode("Usuario o Contraseña incorrecta.");
        header("location:../index.php?mensajeError=$mensajeError");
        exit();
    }
}else{
    header("location:../index.php");
    exit();
}

function validarUsuario($usuario, $pass)
{
    $database = Configuration::getUsuarioDatabase();
    // Realizar consulta
    $sql = "SELECT * FROM usuario WHERE usuario = '" . $usuario . "' AND pass = '" . $pass . "'";
    $result = $database->query($sql);

    return count($result) == 1;
    // 1 = TRUE
    // OTRO = FALSE

}


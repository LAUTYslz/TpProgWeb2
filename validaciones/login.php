<?php
session_start();
if(isset($_POST["usuario"]) && $_POST["pass"]){
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];

    //$esValido = validarUsuario($usuario,$pass);
    $esValido= true;
    if ($esValido){
        $_SESSION["usuario"] = $usuario;

        echo "salio bien";
        header("location:../home.php");
        exit();
    }else{
    echo "SALIO MAL";
    }
}
?>
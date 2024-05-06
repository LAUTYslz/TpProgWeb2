<?php
session_start();

if(isset($_POST["usuario"]) && $_POST["pass"]){
    $usuario = trim($_POST["usuario"]);
    $pass = trim($_POST["pass"]);



    $esValido = validarUsuario($usuario,$pass);

    if ($esValido){
        $_SESSION["usuario"] = $usuario;
        $mensaje = urlencode("Usted ha ingresado en modo-Admin.");
        header("location:../home.php?mensaje=$mensaje");
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
    /*
    $config = parse_ini_file('../config.ini');
    $servername = $config['usuarios']['servername'];
    $username = $config['usuarios']['username'];
    $password = $config['usuarios']['password'];
    $database = $config['usuarios']['database'];
    */
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "login";

    // Crear conexión
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Verificar la conexión
    if (!$conn) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }else{
        // Realizar consulta
        $sql = "SELECT * FROM usuario WHERE usuario = '" . $usuario . "' && pass = '" . $pass . "'";
        $result = mysqli_query($conn, $sql);

        return mysqli_num_rows($result) == 1;
        // 1 = TRUE
        // OTRO = FALSE
    }
}


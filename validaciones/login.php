<?php
session_start();

if(isset($_POST["usuario"]) && $_POST["pass"]){
    $usuario = trim($_POST["usuario"]);
    $pass = trim($_POST["pass"]);

    $mensajeError = "EL Usuario o contraseña es incorrecto";

    $esValido = validarUsuario($usuario,$pass);

    if ($esValido){
        $_SESSION["usuario"] = $usuario;

        header("location:../home.php");
        exit();
    }else{
        header("location:../index.php");
        exit();
    }
}else{
    header("location:../index.php");
    exit();
}

function validarUsuario($usuario, $pass)
{
    $servername = "localhost";
    $username = "root";
    $password = "capoTATO12";

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


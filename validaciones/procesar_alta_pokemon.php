<?php
session_start();
include_once("../helper/Database.php");
include_once ("funcionTipo.php");
include_once ("../Configuration.php");

$database = Configuration::getPokemonDatabase();

// Obtener los valores del formulario
$numero_identificador = $_POST['numero_identificador'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$imagen = $_POST['imagen']["name"];
$descripcion = $_POST['descripcion'];


// Verificar si el número de identificador ya existe
$sql_check = "SELECT * FROM pokemon WHERE numero_identificador = $numero_identificador";
$resultado_check = $database->query($sql_check);

if (!empty($resultado_check)) {
    $mensaje = urldecode("El numero de identificador ya esta en uso.'$numero_identificador', intente con otro numero");
    header("Location: ../home.php?mensaje=$mensaje"); // Redirigir a alguna página
}

// Verificar si se ha subido una nueva imagen
if ($_FILES["imagen"]["name"]) {
    $nombre_archivo = $_FILES["imagen"]["name"];
    $ruta_temporal = $_FILES["imagen"]["tmp_name"];
    $ruta_destino = "../img/" . $nombre_archivo;

    // Mover la nueva imagen al directorio de destino
    move_uploaded_file($ruta_temporal, $ruta_destino);
}
// Consulta SQL para INSERTAR datos en la tabla
$sql = "INSERT INTO pokemon (numero_identificador,imagen,nombre,tipo, descripcion) VALUES ('$numero_identificador', '$ruta_destino', '$nombre', '$tipo', '$descripcion')";


if ($database->execute($sql)) {
    $mensaje=urldecode("Nuevo POKEMON ha sido creado exitosamente") ;
    header("location:../home.php?mensaje=$mensaje");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($database->getError());
}
?>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "Farma100.";
$database = "PokemonDB";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$tipo = $_POST["tipo"];
$imagen_actual = $_POST["imagen_actual"];

// Verificar si se ha subido una nueva imagen
if ($_FILES["nueva_imagen"]["name"]) {
    $nombre_archivo = $_FILES["nueva_imagen"]["name"];
    $ruta_temporal = $_FILES["nueva_imagen"]["tmp_name"];
    $ruta_destino = "../img/" . $nombre_archivo;

    // Mover la nueva imagen al directorio de destino
    move_uploaded_file($ruta_temporal, $ruta_destino);

// tenemos que hacer la logica para que el admi puede modificar el id pero no permietiendo qye haya otro igual.

    // Actualizar la ruta de la imagen en la base de datos

    $sql = "UPDATE pokemon SET nombre = '$nombre', tipo = '$tipo', imagen = '$ruta_destino' WHERE numero_identificador = $id";
} else {
    // No se ha subido una nueva imagen, actualizar solo nombre y tipo
    $sql = "UPDATE pokemon SET nombre = '$nombre', tipo = '$tipo' WHERE numero_identificador = $id";
}

if ($conn->query($sql) === TRUE) {
    echo "Pokémon actualizado correctamente.";
    header('Location: ../home.php');
} else {
    echo "Error al actualizar el Pokémon: " . $conn->error;
    header('Location: ../index.php');
}

$conn->close();
?>


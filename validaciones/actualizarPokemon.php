<?php
session_start();
/*
$config = parse_ini_file('../config.ini');
$servername = $config['pokemon']['servername'];
$username = $config['pokemon']['username'];
$password = $config['pokemon']['password'];
$database = $config['pokemon']['database'];
*/
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
$id= $_POST["id"];
$numero_identificador = $_POST["numero_identificador"];
$nombre = $_POST["nombre"];
$tipo = $_POST["tipo"];
$imagen_actual = $_POST["imagen_actual"];

// Verificar si el número de identificador ya existe
$sql_check = "SELECT * FROM pokemon WHERE numero_identificador = '$numero_identificador' AND id != $id";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
$mensaje=urldecode("El numero de identificador ya esta en uso.'$numero_identificador', intente con otro numero");
header("Location: ../home.php?mensaje=$mensaje"); // Redirigir a alguna página
} else {

// Verificar si se ha subido una nueva imagen
if ($_FILES["nueva_imagen"]["name"]) {
$nombre_archivo = $_FILES["nueva_imagen"]["name"];
$ruta_temporal = $_FILES["nueva_imagen"]["tmp_name"];
$ruta_destino = "../img/" . $nombre_archivo;

// Mover la nueva imagen al directorio de destino
move_uploaded_file($ruta_temporal, $ruta_destino);


// Actualizar la ruta de la imagen en la base de datos

$sql = "UPDATE pokemon SET nombre = '$nombre', tipo = '$tipo', imagen = '$ruta_destino', numero_identificador='$numero_identificador' WHERE id = $id";
} else {
// No se ha subido una nueva imagen, actualizar solo nombre y tipo
$sql = "UPDATE pokemon SET nombre = '$nombre', tipo = '$tipo', numero_identificador='$numero_identificador'WHERE id = $id";
}

if ($conn->query($sql) === TRUE) {
$mensaje=urldecode("Felicidades! su actualizacion fue exitosa");
header("Location: ../home.php?mensaje=$mensaje");
} else {
echo "Error al actualizar el Pokémon: " . $conn->error;
header('Location: ../index.php');
}
}
$conn->close();
?>


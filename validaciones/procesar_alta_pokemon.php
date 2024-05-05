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

// Obtener los valores del formulario
$numero_identificador = $_POST['numero_identificador'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$imagen = $_POST['imagen']["name"];
$descripcion = $_POST['descripcion'];

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

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado exitosamente";

    header("location:../home.php");


} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
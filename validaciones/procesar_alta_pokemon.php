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
$imagen = $_POST['imagen'];
$descripcion = $_POST['descripcion'];

// Consulta SQL para INSERTAR datos en la tabla
$sql = "INSERT INTO pokemon (numero_identificador,imagen,nombre,tipo, descripcion) VALUES ('$numero_identificador', '$imagen', '$nombre', '$tipo', '$descripcion')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado exitosamente";

    header("location:../home.php");


} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
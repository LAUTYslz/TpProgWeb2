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
$id = $_POST['id'];







$sql = "DELETE FROM pokemon WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Eliminado exitosamente";

    header("location:../home.php");


} else {
    echo "No pudimos eliminar tu pokemon, intentalo nuevamente";
}

$conn->close();
?>

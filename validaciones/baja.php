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

// Obtener los valores del formulario
$id = $_POST['id'];

$sql = "DELETE FROM pokemon WHERE id = $id";

if ($conn->query($sql) === TRUE) {
$mensaje=urldecode("Baja exitosa");
header("location:../home.php?mensaje=$mensaje");


} else {
echo "No pudimos eliminar tu pokemon, intentalo nuevamente";
}

$conn->close();
?>

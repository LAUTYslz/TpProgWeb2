<?php
session_start();
include_once("../helper/Database.php");
include_once ("funcionTipo.php");
include_once ("../Configuration.php");

$database = Configuration::getPokemonDatabase();
// Obtener datos del formulario
$id= $_POST["id"];
$numero_identificador = $_POST["numero_identificador"];
$nombre = $_POST["nombre"];
$tipo = $_POST["tipo"];
$imagen_actual = $_POST["imagen_actual"];

// Verificar si el número de identificador ya existe
$sql_check = "SELECT * FROM pokemon WHERE numero_identificador = '$numero_identificador' AND id != $id";
$result_check = $database->query($sql_check);

if (!empty($result_check)) {
$mensaje=urldecode("El numero de identificador ya esta en uso.'$numero_identificador', intente con otro numero");
header("Location: ../home.php?mensaje=$mensaje"); // Redirigir al home
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

if ($database->execute($sql)) {
$mensaje=urldecode("Felicidades! su actualizacion fue exitosa");
header("Location: ../index.php?mensaje=$mensaje&path=home");
} else {
echo "Error al actualizar el Pokémon: " . $database->getError();
header('Location: ../index.php?path=inicio');
}
}
?>


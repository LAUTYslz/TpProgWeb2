<?php
session_start();
include_once ("../Configuration.php");
include_once("../helper/Database.php");
include_once ("funcionTipo.php");

$database=Configuration::getPokemonDatabase();

// Obtener los valores del formulario
$id = $_POST['id'];

$sql = "DELETE FROM pokemon WHERE id = $id";

if ($database->execute($sql)) {
$mensaje=urldecode("Baja exitosa");
header("location:../home.php?mensaje=$mensaje");
} else {
echo "No pudimos eliminar tu pokemon, intentalo nuevamente";
}
?>

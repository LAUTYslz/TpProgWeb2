<?php
include_once("helper/Database.php");
include_once ("funcionTipo.php");
include_once ("Configuration.php");

$database = Configuration::getPokemonDatabase();
$pokemones = $database->query( "SELECT imagen, nombre, tipo, numero_identificador FROM pokemon");

if (!empty($pokemones)) {

    foreach ($pokemones as $pokemon){
        echo "<tr>";
        echo "<td><img src='img/" . $pokemon['imagen'] . "' alt='" . $pokemon['nombre'] . "'></td>";
        echo " <input type='hidden' name='id' value=' " . $pokemon['numero_identificador'] . "'>";
        echo "<td><a href='pokemon.php?id=" . $pokemon['numero_identificador'] . "'>" . $pokemon['nombre'] . "</a></td>";
        $tipo = $pokemon['tipo'];
        $tipoImagen = obtenerImagenTipo($tipo);

        echo "<td><img src='./img/tipo/" . $tipoImagen . ".png' alt='" . $tipo . "' class='tipo-imagen'></td>";
        echo "<td>" . $pokemon['numero_identificador'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>0 resultados encontrados.</td></tr>";
}


?>
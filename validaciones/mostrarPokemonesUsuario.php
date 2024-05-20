
<?php
include_once("helper/Database.php");
include_once ("funcionTipo.php");
include_once ("Configuration.php");

$database = Configuration::getPokemonDatabase();
$pokemones = $database->query( "SELECT imagen, nombre, tipo, numero_identificador FROM pokemon");

    // Output data of each row
    if (!empty($pokemones)) {

        foreach ($pokemones as $pokemon){
            echo "<tr>";
            echo "<td><img src='img/" . $pokemon["imagen"] . "' alt='" . $pokemon["nombre"] . "'></td>";
            echo " <input type='hidden' name='id' value=' " . $pokemon['numero_identificador'] . "'>";
            echo "<td><a href='pokemon.php?id=" . $pokemon["numero_identificador"] . "'>" . $pokemon["nombre"] . "</a></td>";
            /* echo "<td>" . $row["tipo"] . "</td>";*/
            $tipo = $pokemon["tipo"];
            $tipoImagen = obtenerImagenTipo($tipo);

            echo "<td><img src='./img/tipo/" . $tipoImagen . ".png' alt='" . $tipo . "' class='tipo-imagen'></td>";
            echo "<td>" . $pokemon["numero_identificador"] . "</td>";
            echo "</tr>";
            echo "<tr>";

            //boton modificar
            echo "<td>";
            echo "<form action='validaciones/modificarPokemon.php' method='post'>";
            echo " <input type='hidden' name='id' value=' " . $pokemon['numero_identificador'] . "'>";
            echo "<input type='submit' value='Modificar' class= 'btn modificar'>";
            echo "</form>";
            echo "</td>";
            //boton dar de baja
            echo "<td>";
            echo "<form action='validaciones/darDeBajaPokemon.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . $pokemon["numero_identificador"] . "'>";
            echo "<input type='submit' value='Dar de Baja' class='btn dar-baja'>";
            echo "</form>";
            echo "</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>0 resultados encontrados.</td></tr>";
    }

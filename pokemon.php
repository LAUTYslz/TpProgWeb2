<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/pokemon.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
include_once("components/nav.php");
?>

<main>
            <?php
            include_once ("Configuration.php");
            include_once ("helper/Database.php");
            include_once ("validaciones/funcionTipo.php");

            if (isset($_GET["id"])) {
                $id_solicitado = $_GET["id"];

            } else {
                echo "El identificador no ha sido enviado correctamente.";
                    var_dump($_GET);
                exit();
            }
            $database = Configuration::getPokemonDatabase();
            // Consulta SQL para obtener datos de la tabla
            $sql = "SELECT * FROM pokemon where numero_identificador like $id_solicitado";
            $pokemones = $database->query($sql);
            // incluir funcion
            if (!empty($pokemones)) {
                foreach ($pokemones as $pokemon) {

                    echo "<div class='pokemon-info'><h1>Pokemon: ". "$pokemon[nombre]</h1>";
                    echo "<h2>Descripcion</h2>"." <p>$pokemon[descripcion]</p>";
                    /* echo "<td>" . $row["tipo"] . "</td>";*/
                    $tipo = $pokemon["tipo"];
                    $tipoImagen = obtenerImagenTipo($tipo);

                    echo "<h2>Tipo</h2><img src='./img/tipo/" . $tipoImagen . ".png' alt='" . $tipo . "' class='tipo-imagen'> </div><br>";
                    echo "<div class='pokemon-foto'><img src='img/" . $pokemon['imagen'] . "'></div>";
                }
            } else {
                echo "<p>0 resultados encontrados.</p>";
            }
            ?>
</main>
</body>


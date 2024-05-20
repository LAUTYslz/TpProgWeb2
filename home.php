<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">

    <title>Pokedex</title>
</head>
<body>

    <?php
    session_start();
    include_once("./components/nav-admin.php");
    if (isset($_GET['mensaje'])) {
// Recupera el mensaje y decodifica la URL
        $mensaje = urldecode($_GET['mensaje']);
// Muestra el mensaje
        echo "<p>$mensaje</p>";
    }
    ?>

    <main>
        <div class="container contenedor-busqueda">
            <h2>Buscar</h2>
            <form action="index.php?controller=home&action=busqueda" class="form-buscar" method="GET">
                <label for="busqueda">Buscar:</label>
                <input type="text" id="busqueda" name="busqueda">
                <button type="submit">Buscar</button>
            </form>

        </div>

        <div class="tablaestilo contenedor-tabla">
            <table>
                <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Número</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (!empty($pokemones)) {

                    foreach ($pokemones as $pokemon){
                        echo "<tr>";
                        echo "<td><img src='img/" . $pokemon["imagen"] . "' alt='" . $pokemon["nombre"] . "'></td>";
                        echo " <input type='hidden' name='id' value=' " . $pokemon['numero_identificador'] . "'>";
                        echo "<td><a href='pokemon.php?controller=home&action=verPokemon&id=" . $pokemon["numero_identificador"] . "'>" . $pokemon["nombre"] . "</a></td>";
                        /* echo "<td>" . $row["tipo"] . "</td>";*/
                        $tipo = $pokemon["tipo"];
                        $tipoImagen = obtenerImagenTipo($tipo);

                        echo "<td><img src='./img/tipo/" . $tipoImagen . ".png' alt='" . $tipo . "' class='tipo-imagen'></td>";
                        echo "<td>" . $pokemon["numero_identificador"] . "</td>";
                        echo "</tr>";
                        echo "<tr>";

                        //boton modificar
                        echo "<td>";
                        echo "<form action='index.php?controller=home&action=modificar' method='post'>";
                        echo " <input type='hidden' name='id' value=' " . $pokemon['numero_identificador'] . "'>";
                        echo "<input type='submit' value='Modificar' class= 'btn modificar'>";
                        echo "</form>";
                        echo "</td>";
                        //boton dar de baja
                        echo "<td>";
                        echo "<form action='index.php?controller=home&action=darDeBaja' method='post'>";
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
                ?>
                </tbody>
            </table>
        </div>
        <form action='index.php?controller=home&action=darDeAlta' method='post'>";
            <button class="alta" type="submit">Dar de Alta un Nuevo Pokemon </button>
        </form>
    </main>
</body>
</html>


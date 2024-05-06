<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">
    <title>Pokedex</title>

    <style>

    </style>
</head>
<body>

<?php
include_once("components/header.php");
// Verificar si se ha pasado un mensaje en la URL
if (isset($_GET['mensaje'])) {
// Recupera el mensaje y decodifica la URL
    $mensaje = urldecode($_GET['mensaje']);
// Muestra el mensaje
    echo "<p>$mensaje</p>";
}
if (isset($_GET['mensajeError'])) {
// Recupera el mensaje y decodifica la URL
    $mensaje = urldecode($_GET['mensajeError']);
// Muestra el mensaje
    echo "<p>$mensaje</p>";
}
?>

<main>
    <div class="container contenedor-busqueda">
        <!--<h2>Buscar</h2>-->

        <form action="busqueda.php" class="form-buscar" method="GET">
            <label for="busqueda">Buscar:</label>
            <input type="text" id="busqueda" name="busqueda" >
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

            <?php include_once ("validaciones/mostrarPokemones.php");
            ?>

            </tbody>
        </table>
    </div>

</main>
</body>
</html>


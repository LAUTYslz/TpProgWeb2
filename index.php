<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header img {
            height: 50px;
        }
        header input[type="text"],
        header input[type="password"] {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-right: 10px;

        }
        main {
            padding: 20px;
        }
        .container {
            margin-bottom: 20px;
        }
        .tablaestilo{
            display: flex;
            flex-wrap: wrap; /* Permite que los elementos se envuelvan en múltiples líneas */

            width: 600px;
        }
        .tablaestilo div{
            width: calc(13.33% - 20px); /* Calcula el ancho de cada elemento para que haya 3 elementos por fila */
            margin-bottom: 20px;
        }




        .tablaestilo th,
        .tablaestilo td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            font-size: 14px; /* Tamaño de fuente */
        }
        .tablaestilo th {
            background-color: #f2f2f2;
            font-weight: bold; /* Negrita para encabezados */
            width: 33%;
        }
        .tablaestilo img {
            max-width: 100px;
            height: auto;
            transition: transform 0.3s ease; /* Añade una transición para el efecto de movimiento */
        }
        .tablaestilo img:hover {
            transform: translateY(-5px); /* Mueve la imagen hacia arriba al pasar el mouse sobre ella */
        }

        /* Estilos responsivos */
        @media screen and (max-width: 768px) {
            /* Ajusta el tamaño de la fuente para pantallas más pequeñas */
            .tablaestilo th,
            .tablaestilo td {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

<?php
include_once("components/header.php");
?>

<main>
    <div class="container">
        <h2>Buscar</h2>

        <form action="busqueda.php" method="GET">
            <label for="busqueda">Buscar:</label>
            <input type="text" id="busqueda" name="busqueda" >
            <button type="submit">Buscar</button>
        </form>

    </div>


    <div class="tablaestilo">
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


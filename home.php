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
        p{
            text-align: center;
            color: #333333;
            font-family: "Arial Black";
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #f2f2f2;
        }
        .alta{
            position: fixed;
                top: 50px; /* Ajusta la distancia desde arriba según tu preferencia */
            margin-top: 100px;
                right: 100px; /* Ajusta la distancia desde la derecha según tu preferencia */
                z-index: 1000; /* Ajusta el índice z según sea necesario para asegurarte de que esté por encima de otros elementos */
                padding: 10px 20px;
                background-color: #007bff; /* Color de fondo del botón */
                color: #fff; /* Color del texto del botón */
                border: none;
                border-radius: 30px;
                cursor: pointer;

        }
    </style>
</head>
<body>

    <?php
    session_start();
    include_once ("./components/hearder-admin.php");
    if (isset($_GET['mensaje'])) {
// Recupera el mensaje y decodifica la URL
        $mensaje = urldecode($_GET['mensaje']);
// Muestra el mensaje
        echo "<p>$mensaje</p>";
    }
    ?>

    <main>
        <div class="container">
            <h2>Buscar</h2>
            <form action="busqueda.php" method="GET">
                <label for="busqueda">Buscar:</label>
                <input type="text" id="busqueda" name="busqueda">
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
                <?php include_once ("validaciones/mostrarPokemonesUsuario.php") ?>
                </tbody>
            </table>
        </div>
        <form action='validaciones/darDeAltaPokemon.php' method='post'>";
            <button class="alta" type="submit">Dar de ALta un Nuevo Pokemon </button>

    </main>
</body>
</html>


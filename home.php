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
    </style>
</head>
<body>

    <?php
    session_start();
    include_once ("./components/hearder-admin.php");
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
    </main>
</body>
</html>


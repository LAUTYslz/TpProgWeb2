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
            <form action="/buscar" method="GET">
                <input type="text" name="query" placeholder="Ingrese su búsqueda">
                <br>
                <input type="submit" value="Buscar">
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
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "Farma100.";
                $database = "PokemonDB";

                // Crear conexión
                $conn = new mysqli($servername, $username, $password, $database);

                // Verificar conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                // Consulta SQL para obtener datos de la tabla
                $sql = "SELECT imagen, nombre, tipo, numero_identificador FROM pokemon";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><img src='img/" . $row["imagen"] . "' alt='" . $row["nombre"] . "'></td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["tipo"] . "</td>";
                        echo "<td>" . $row["numero_identificador"] . "</td>";
                        echo "<td>" . "<input type=submit value=Modificar>". "</td>";
                        echo "<td>" . "<input type=submit value=Baja>". "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>0 resultados encontrados.</td></tr>";
                }

                // Cerrar conexión
                $conn->close();
                ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>


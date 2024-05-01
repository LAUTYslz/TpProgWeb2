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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #f2f2f2;
        }
        .tablaestilo {
            overflow-x: auto;
        }
        .tablaestilo table {
            width: auto;
        }
        .tablaestilo img {
            max-width: 300px;
            height: auto;

        }
    </style>
</head>
<body>

<?php
include_once("components/header.php");
?>

<main>
            <?php
            if (isset($_POST["numero_identificador"])) {
                $id_solicitado = $_POST["numero_identificador"];
            } else {
                echo "El identificador no ha sido enviado correctamente.";
                    var_dump($_POST);
                exit;
            }
            $servername = "localhost";
            $username = "root";
            $password = "capoTATO12";
            $database = "PokemonDB";

            // Crear conexión
            $conn = new mysqli($servername, $username, $password, $database);

            // Verificar conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta SQL para obtener datos de la tabla
            $sql = "SELECT * FROM pokemon where numero_identificador like $id_solicitado";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    echo "<h1>$row[nombre]</h1>";
                    echo "<p>$row[descripcion]</p>";
                    echo "<img src='img/" . $row['imagen'] . "'>";
                }
            } else {
                echo "<tr><td colspan='4'>0 resultados encontrados.</td></tr>";
            }

            $conn->close();
?>
</main>
</body>


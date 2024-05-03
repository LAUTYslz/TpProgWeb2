
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
include_once ("../components/hearder-admin.php");
?>
<main>
    <?php
        $id_obtenido = $_POST["id"];

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
        $sql = "SELECT * FROM pokemon WHERE numero_identificador = $id_obtenido";
        $result = $conn->query($sql);

        if($result->num_rows>0){
            $row = $result->fetch_assoc();
        ?>
        <h2>BAJA Pokémon</h2>
        <form class="baja" action="baja.php" method="post" enctype="multipart/form-data">
            <!--mostrar id-->
            <label for="nombre">ID :</label><br>
            <input type="text" name="id" value="<?php echo $row['id']; ?>"><br>
            <label for="nombre">Numero de Identificador:</label><br>
            <input type="text" name="numero_identificador" value="<?php echo $row['numero_identificador']; ?>"><br>
            <!--mostrar nombre-->
            <label for="nombre">Nombre:</label><br>
            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"><br>
            <!--mostrar tipo-->
            <label for="tipo">Tipo:</label><br>
            <input type="text" name="tipo" value="<?php echo $row['tipo']; ?>"><br>
            <!--mostrar imagen-->
            <label for="imagen">Imagen:</label><br>
            <img class="imagen" src="<?php echo $row['imagen']; ?>">



            <input type="submit" value="BAJA">
        </form>
        <?php
            } else {
                echo "No se encontró ningún Pokémon con el ID proporcionado.";
                heade;
            }
            $conn->close();
        ?>
</main>
</body>
</html>


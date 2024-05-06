
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/dar-de-baja.css">

    <?php
    session_start();
    include_once ("../components/header-admin-validaciones.php");
    ?>
    <style>
        /*
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
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
        h2 {
            margin-top: 0;
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: 0 auto;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        img.imagen {
            max-width: 100%;
            margin-top: 10px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
        */

    </style>


</head>
<body>

<main>
    <?php
        $id_obtenido = $_POST["id"];

        /*
        $config = parse_ini_file('../config.ini');
        $servername = $config['pokemon']['servername'];
        $username = $config['pokemon']['username'];
        $password = $config['pokemon']['password'];
        $database = $config['pokemon']['database'];
        */

        $servername = "localhost";
        $username = "root";
        $password = "";
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
        <h2 class="titulo-baja">BAJA Pokémon</h2>
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
            <img class="imagen" src="../img/<?php echo $row['imagen']; ?>">



            <input class="boton-baja" type="submit" value="BAJA">
        </form>
        <?php


    } else {
                echo "No se encontró ningún Pokémon con el ID proporcionado.";

            }
            $conn->close();
        ?>
</main>
</body>
</html>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/busqueda.css">

    <title>Pokedex</title>
    <style>
        .tipo-imagen {
            /*
            width: 64px;  /* para que se quede como icono
            height: 64px;

            width: 4vh;
            height: 4vh;

             */
        }
    </style>
</head>
<body>
<?php

include_once("components/header.php");

?>
<main>
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['busqueda'])) {

    $busqueda = htmlspecialchars($_GET['busqueda']); //

    // Crear conexión
    /*
    $config = parse_ini_file('config.ini');

    $servername = $config['pokemon']['servername'];
    $username = $config['pokemon']['root'];
    $password = $config['pokemon']['password'];
    $database = $config['pokemon']['database'];
    */
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "PokemonDB";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }


// Verificar si se ha enviado un nombre para filtrar
    if (isset($_GET['busqueda'])) {
        // Obtener y limpiar el nombre del Pokémon para evitar inyecciones de SQL
        $nombre_pokemon = mysqli_real_escape_string($conn, $_GET['busqueda']);

        // Consulta SQL para filtrar el Pokémon por nombre
        $sql = "SELECT * FROM pokemon WHERE nombre = '$nombre_pokemon'";
        $result = $conn->query($sql);
// incluir funcion
        include_once("validaciones/funcionTipo.php");
        // Verificar si se encontró el Pokémon
        if ($result->num_rows > 0) {
            // Mostrar la tabla solo con el Pokémon filtrado
            echo "<div class='tablaestilo contenedor-tabla'>";
            echo "<table border='1' >";
            echo "<tr><th>Imagen</th><th>Nombre</th><th>Tipo</th><th>Número Identificador</th><th>Descripcion</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='img/" . $row["imagen"] . "' alt='" . $row["nombre"] . "'></td>";
                echo "<td>" . $row["nombre"] . "</td>";
                /* echo "<td>" . $row["tipo"] . "</td>";*/
                $tipo = $row["tipo"];
                $tipoImagen = obtenerImagenTipo($tipo);

                echo "<td><img src='./img/tipo/" . $tipoImagen . ".png' alt='" . $tipo . "' class='tipo-imagen'></td>";
                echo "<td>" . $row["numero_identificador"] . "</td>";
                echo "<td>" . $row["descripcion"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        } else {
            $mensaje = urlencode("No se encontró ningún Pokémon con el nombre '$nombre_pokemon'.");
            header("Location: ../index.php?mensaje=$mensaje"); // agragmos el mensaje para que aparezca en el index
            exit;
        }


        // Liberar el conjunto de resultados
        $result->free();
    } else {
        // Si no se ha enviado un nombre para filtrar, mostrar mensaje de error
        echo "Debe ingresar un nombre de Pokémon para filtrar.";
    }

// Cerrar conexión
    $conn->close();
}
    ?>
</main>
</body>
</html>

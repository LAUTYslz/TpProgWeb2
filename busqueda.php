<?php

include_once("components/header.php");



if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['busqueda'])) {

    $busqueda = htmlspecialchars($_GET['busqueda']); //

    // Crear conexión
    $servername = "localhost";
    $username = "root";
    $password = "Farma100.";
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

        // Verificar si se encontró el Pokémon
        if ($result->num_rows > 0) {
            // Mostrar la tabla solo con el Pokémon filtrado
            echo "<table border='1'>";
            echo "<tr><th>Imagen</th><th>Nombre</th><th>Tipo</th><th>Número Identificador</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='img/" . $row["imagen"] . "' alt='" . $row["nombre"] . "'></td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["tipo"] . "</td>";
                echo "<td>" . $row["numero_identificador"] . "</td>";
                echo "<td>" . $row["descripcion"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
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
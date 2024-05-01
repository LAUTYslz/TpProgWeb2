<?php

include_once("components/header.php");


// Verificar si se ha enviado una consulta desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['busqueda'])) {
    // Limpiar y validar la entrada del usuario
    $busqueda = htmlspecialchars($_GET['busqueda']); // Evita inyecciones de código HTML/JavaScript

    // Crear conexión
    $servername = "localhost";
    $username = "root";
    $password = "capoTATO12";
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
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontró ningún Pokémon con el nombre '$nombre_pokemon'.";
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
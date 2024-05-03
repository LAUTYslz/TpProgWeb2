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
        echo "<div class='pokemon'>";
        echo "<tr>";
        echo "<td><img src='img/" . $row["imagen"] . "' alt='" . $row["nombre"] . "'></td>";
        echo " <input type='hidden' name='id' value=' " . $row['numero_identificador'] . "'>";
        echo "<td><a href='pokemon.php?id=" . $row["numero_identificador"] . "'>" . $row["nombre"] . "</a></td>";
        echo "<td>" . $row["tipo"] . "</td>";
        echo "<td>" . $row["numero_identificador"] . "</td>";
        echo "</tr>";
        echo "</div>";
        echo "</div>";

    }
} else {
    echo "<tr><td colspan='4'>0 resultados encontrados.</td></tr>";
}

$conn->close();
?>
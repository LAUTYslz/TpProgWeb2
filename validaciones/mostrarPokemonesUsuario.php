<style>
    .pokemon item{
        width: calc(33.33% - 10px); /* Calcula el ancho de cada elemento para que haya 3 elementos por fila */
        margin-bottom: 20px; /* Espacio entre filas */
        /* Otros estilos de los elementos, como padding, border, etc. */
    }
    .tipo-imagen {
        width: 6vh;  /* para que se quede como icono*/
        height: 6vh;

    }
    .btn {
        display: inline-block;
        padding: 8px 16px;
        font-size: 16px;
        cursor: pointer;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        text-align: center;
        text-decoration: none;
    }

    .btn:hover {
        background-color: #0056b3;
    }
    .modificar {
        background-color: #28a745;
    }

    .modificar:hover {
        background-color: #218838;
    }
    .dar-baja {
        background-color: #dc3545;
    }

    .dar-baja:hover {
        background-color: #c82333;
    }

</style>
<?php
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
$sql = "SELECT imagen, nombre, tipo, numero_identificador FROM pokemon";
$result = $conn->query($sql);

// incluir funcion
include_once("funcionTipo.php");
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img src='img/" . $row["imagen"] . "' alt='" . $row["nombre"] . "'></td>";
        echo " <input type='hidden' name='id' value=' " . $row['numero_identificador'] . "'>";
        echo "<td><a href='pokemon.php?id=" . $row["numero_identificador"] . "'>" . $row["nombre"] . "</a></td>";
        /* echo "<td>" . $row["tipo"] . "</td>";*/
        $tipo = $row["tipo"];
        $tipoImagen = obtenerImagenTipo($tipo);

        echo "<td><img src='./img/tipo/" . $tipoImagen . ".png' alt='" . $tipo . "' class='tipo-imagen'></td>";
        echo "<td>" . $row["numero_identificador"] . "</td>";
        echo "</tr>";
        echo "<tr>";

        //boton modificar
        echo "<td>";
        echo "<form action='validaciones/modificarPokemon.php' method='post'>";
        echo " <input type='hidden' name='id' value=' " . $row['numero_identificador'] . "'>";
        echo "<input type='submit' value='Modificar' class= 'btn modificar'>";
        echo "</form>";
        echo "</td>";
        //boton dar de baja
        echo "<td>";
        echo "<form action='validaciones/darDeBajaPokemon.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $row["numero_identificador"] . "'>";
        echo "<input type='submit' value='Dar de Baja' class='btn dar-baja'>";
        echo "</form>";
        echo "</td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>0 resultados encontrados.</td></tr>";
}

// Cerrar conexión
$conn->close();
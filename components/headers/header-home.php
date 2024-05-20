<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">

    <title>Pokedex</title>
</head>
<body>

    <?php
    session_start();
    ?>
    <header>
    <div>
        <img src="img/logo.svg" alt="Logo">
    </div>
    <h1>Pokedex</h1>
    <?php
    echo '<h2 class="user-name">Hola!  '. $_SESSION['usuario'].'</h2>'
    ?>
    </header>    if (isset($_GET['mensaje'])) {
// Recupera el mensaje y decodifica la URL
        $mensaje = urldecode($_GET['mensaje']);
// Muestra el mensaje
        echo "<p>$mensaje</p>";
    }
    ?>

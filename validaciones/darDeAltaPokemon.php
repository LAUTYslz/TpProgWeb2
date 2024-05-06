<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar de alta un Pokémon</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/dar-de-alta.css">


    <?php
    session_start();
    include_once ("../components/header-admin-validaciones.php");
    ?>
    <style>



    </style>

</head>
<body>
    <main>
        <h2 class="alta-titulo">NUEVO POKEMON</h2>
        <div class="container cont-dar-alta">
        <form class="dar-de-alta" action="procesar_alta_pokemon.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="numero_identificador">Número de Identificador:</label>
                <input type="text" id="numero_identificador" name="numero_identificador" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select id="tipo" name="tipo" required>
                    <option value="Hierba" name="tipo">Hierba</option>
                    <option value="Fuego" name="tipo">Fuego</option>
                    <option value="Planta" name="tipo">Planta</option>
                </select>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" >
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>
            <button type="submit">Enviar</button>
        </form>
        </div>
    </main>
</body>
</html>

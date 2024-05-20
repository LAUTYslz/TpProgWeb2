<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/modificar-pokemon.css">
    <?php
    session_start();
    include_once("components/nav-admin.php");
    include_once("helper/Database.php");
    include_once ("validaciones/funcionTipo.php");
    include_once ("Configuration.php");
    ?>
</head>
<body>


<main>
    <?php
        $id_obtenido = $_POST["id"];

        $database = Configuration::getPokemonDatabase();
        // Consulta SQL para obtener datos de la tabla
        $sql = "SELECT * FROM pokemon WHERE numero_identificador = $id_obtenido";
        $pokemonBuscado = $database->query($sql);

        if(!empty($pokemonBuscado)){
            $pokemonBuscado = $pokemonBuscado[0];
    ?>
            <h2 class="titulo-modificar">Modificar Pokémon</h2>
            <form class="actualizar" action="validaciones/actualizarPokemon.php" method="post" enctype="multipart/form-data">
                <!--mostrar id-->

                <input type="hidden" name="id" value="<?php echo $pokemonBuscado['id']; ?>"><br>
                <label for="nombre">Numero de Identificador:</label>
                <input type="text" name="numero_identificador" value="<?php echo $pokemonBuscado['numero_identificador']; ?>"><br>
                <!--mostrar nombre-->

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $pokemonBuscado['nombre']; ?>"><br>
                <!--mostrar tipo-->
                <label for="tipo">Tipo:</label>
                <select id="tipo" name="tipo" required>
                    <option value="Hierba" name="tipo">Hierba</option>
                    <option value="Fuego" name="tipo">Fuego</option>
                    <option value="Planta" name="tipo">Planta</option>
                </select>
                <!--mostrar imagen-->
                <label for="imagen">Imagen:</label><br>
                <img class="imagen" src="img/<?php echo $pokemonBuscado['imagen']; ?>">
                <input type="text" name="imagen_actual" value="<?php echo $pokemonBuscado['imagen']; ?>"><br>
                <!--subir nueva  imagen-->
                <label>Subir Nueva Imagen</label><br>
                <input type="file" id="nueva_imagen" name="nueva_imagen" accept="image/*" <?php echo $pokemonBuscado['imagen']; ?><br>

                <input class="boton-modificar" type="submit" value="Guardar Cambios">
            </form>
        <?php
                } else {
                    echo "No se encontró ningún Pokémon con el ID proporcionado.";
                }
        ?>
</main>
</body>
</html>


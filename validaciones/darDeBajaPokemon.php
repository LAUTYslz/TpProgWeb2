
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/dar-de-baja.css">

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
    //if($result->num_rows>0){
      //      $row = $result->fetch_assoc();
    if(!empty($pokemonBuscado)){
        $pokemonBuscado = $pokemonBuscado[0];
        ?>
        <h2 class="titulo-baja">BAJA Pokémon</h2>
        <form class="baja" action="validaciones/baja.php" method="post" enctype="multipart/form-data">
            <!--mostrar id-->
            <label for="nombre">ID :</label><br>
            <input type="text" name="id" value="<?php echo $pokemonBuscado['id']; ?>"><br>
            <label for="nombre">Numero de Identificador:</label><br>
            <input type="text" name="numero_identificador" value="<?php echo $pokemonBuscado['numero_identificador']; ?>"><br>
            <!--mostrar nombre-->
            <label for="nombre">Nombre:</label><br>
            <input type="text" name="nombre" value="<?php echo $pokemonBuscado['nombre']; ?>"><br>
            <!--mostrar tipo-->
            <label for="tipo">Tipo:</label><br>
            <input type="text" name="tipo" value="<?php echo $pokemonBuscado['tipo']; ?>"><br>
            <!--mostrar imagen-->
            <label for="imagen">Imagen:</label><br>
            <img class="imagen" src="img/<?php echo $pokemonBuscado['imagen']; ?>">



            <input class="boton-baja" type="submit" value="BAJA">
        </form>
        <?php
    } else {
                echo "No se encontró ningún Pokémon con el ID proporcionado.";
            }
        ?>
</main>
</body>
</html>


<header>
    <div>
        <img src="img/logo.svg" alt="Logo">
    </div>
    <h1>Pokedex</h1>
    <?php
    echo '<h2 class="user-name">Hola!  '. $_SESSION['usuario'].'</h2>'
    ?>
</header>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
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
    .container {
        margin-bottom: 20px;

    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table th, table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
    }
    table th {
        background-color: #f2f2f2;
    }
    .tablaestilo {
        overflow-x: auto;
    }
    .tablaestilo table {
        width: auto;
    }
    .tablaestilo img {
        max-width: 300px;
        height: auto;

    }
</style>
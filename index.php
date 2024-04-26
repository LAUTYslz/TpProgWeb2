<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<header>
    <div>
        <img src="img/logo.svg" alt="Logo">
    </div>
    <h1>Pokedex</h1>
    <div>
        <input type="text" placeholder="usuario">
        <input type="text" placeholder="contraseña">
        <input type="submit" value="Ingresar">
    </div>
</header>

<table>
    <thead>
    <tr>
        <th>Imagen</th>
        <th>Tipo</th>
        <th>Nombre</th>
        <th>Número</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><img src="imagen1.jpg" alt="Imagen 1"></td>
        <td>Tipo 1</td>
        <td>Nombre 1</td>
        <td>123456789</td>
    </tr>
    <tr>
        <td><img src="imagen2.jpg" alt="Imagen 2"></td>
        <td>Tipo 2</td>
        <td>Nombre 2</td>
        <td>987654321</td>
    </tr>
    </tbody>
</table>

</body>
</html>

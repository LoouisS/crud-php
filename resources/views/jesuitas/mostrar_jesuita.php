<?php

    require_once '..\..\..\app\Models\database_connector.php';
    require_once '..\..\..\app\Models\jesuita.php';


    $db = new DatabaseConnector();
    $jesuita = new Jesuita($db);

    $jesuitas = $jesuita->read();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Jesuitas</title>
    <style>
        h1 {
            text-align: center;
            background-color: #3498db;
            color: #fff;
            padding: 10px;
        }

        h1 a {
            color: white;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #3498db;
            text-align: center;
            display: block;
            padding: 5px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1><a href="../../../index.html">Lista de Jesuitas</a></h1>
    <form method="POST" action="crear_jesuita.php">
        <label for="idJesuita">Numero Puesto:</label>
        <input type="text" name="idJesuita" id="idJesuita">
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="firma">Firma:</label>
        <input type="text" name="firma" id="firma">
        <br>
        <input type="submit" value="Agregar Jesuita ➕">
    </form>
    <table border="1">
        <tr>
            <th>Numero de puesto</th>
            <th>Nombre</th>
            <th>Firma</th>
            <th>Modificar Jesuita</th>
            <th>Borrar Jesuita</th>
        </tr>
        <?php
            foreach ($jesuitas as $j) {
                echo "<tr>";
                echo "<td>" . $j['idJesuita'] . "</td>";
                echo "<td>" . $j['nombre'] . "</td>";
                echo "<td>" . $j['firma'] . "</td>";
                echo "<td><a href='modificar_jesuita.php?id=" . $j['idJesuita'] . "&nombre=" . $j['nombre'] . "&firma=" . $j['firma'] . "'>Modificar</a></td>";
                echo "<td><a href='borrar_jesuita.php?id=" . $j['idJesuita'] . "'>Borrar</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
    <a href="../index.html">Volver a la página de inicio</a>
</body>
</html>

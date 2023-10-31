<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Lista de Lugares</title>
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
    <h1><a href="../../../index.html">Lista de Lugares</a></h1>
    <form method="POST" action="crear_lugar.php"> 
    <label for="ip">IP Lugar</label> 
    <input type="text" name="ip" id="ip"> 
    <br> 
    <label for="lugar">Lugar:</label> 
    <input type="text" name="lugar" id="lugar"> 
    <br> 
    <label for="descripcion">Descripcion:</label> 
    <input type="text" name="descripcion" id="descripcion"> 
    <br> 
    <input type="submit" value="Agregar Lugar ➕"> 
    </form> 
    <table border="1">
        <tr>
            <th>IP Lugar</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Modificar Lugar</th>
            <th>Borrar Lugar</th>
        </tr>
        <?php
            // TODO Probar estas rutas en el hosting
            require_once '..\..\..\app\Models\database_connector.php';
            require_once '..\..\..\app\Models\lugares.php';

            $db = new DatabaseConnector();
            $lugares = new Lugares($db);

            $lugar = $lugares->read();
            foreach ($lugar as $l) {
                echo "<tr>";
                echo "<td>" . $l['ip'] . "</td>";
                echo "<td>" . $l['lugar'] . "</td>";
                echo "<td>" . $l['descripcion'] . "</td>";
                echo "<td><a href='modificar_lugar.php?ip=" . $l['ip'] . "&lugar=" . $l['lugar'] . "&descripcion=" . $l['descripcion'] . "'>Modificar</a></td>";
                echo "<td><a href='borrar_lugar.php?ip=" . $l['ip'] . "'>Borrar</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
    <a href="../../../index.html">Volver a la página de inicio</a>
</body>
</html>

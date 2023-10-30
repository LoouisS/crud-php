<?php

?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Visitas</title>
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
    <h1><a href="../../../index.html">Lista de Visitas</a></h1>
    <h2>Realizar Visita</h2>
    <form method="POST" action="realizar_visita.php">
    <label for="idJesuita">Jesuita</label>
    <select name="idJesuita" id="idJesuita">
        <?php
        // TODO Probar estas rutas en el hosting
        require_once '..\..\..\app\Models\database_connector.php';
        require_once '..\..\..\app\Models\visitas.php';

        $db = new DatabaseConnector();
        $visitas = new Visitas($db);

        $visita = $visitas->read();
        $jesuitas = $visitas->obtenerJesuitas();
        foreach ($jesuitas as $idJesuita => $nombre) {
            echo "<option value='$idJesuita'>$nombre</option>";
        }
        ?>
    </select>
    <br>
    <label for="ipLugar">Visitar</label>
    <select name="ipLugar" id="ipLugar">
        <?php
        $lugares = $visitas->obtenerLugares();
        foreach ($lugares as $ip => $lugar) {
            echo "<option value='$ip'>$lugar</option>";
        }
        ?>
    </select>
    <br>
    <input type="submit" value="Realizar visita ➕">
</form>

    <table border="1">
        <tr>
            <th>Jesuita</th>
            <th>Lugar</th>
            <th>fechaHora Visita</th>
        </tr>
        <?php
            foreach ($visita as $v) {
                echo "<tr>";
                echo "<td>" . $v['nombreJesuita'] . "</td>";
                echo "<td>" . $v['nombreLugar'] . "</td>";
                echo "<td>" . $v['fechaHora'] . "</td>";    
                echo "</tr>";
            }
        ?>
    </table>
    <a href="../../../index.html">Volver a la página de inicio</a>
</body>
</html>

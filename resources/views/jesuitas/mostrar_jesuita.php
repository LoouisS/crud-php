<!DOCTYPE html>
<html>
<head>
    <title>Lista de Jesuitas</title>
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
        <?php foreach ($jesuitas as $j): ?>
            <tr>
                <td><?php $j['idJesuita'] ?></td>
                <td><?php $j['nombre'] ?></td>
                <td><?php $j['firma'] ?></td>
                <td><a href='modificar_jesuita.php?id=<?= $j['idJesuita'] ?>&nombre=<?= $j['nombre'] ?>&firma=<?= $j['firma'] ?>'>Modificar</a></td>
                <td><a href='borrar_jesuita.php?id=<?= $j['idJesuita'] ?>'>Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../../../index.html">Volver a la página de inicio</a>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Jesuita</title>
</head>
<body>
    <?php
    // Incluye la clase Jesuita y la conexión a la base de datos
    require_once getcwd() . '/app/Models/database_connector.php';
    require_once getcwd() . '/app/Models/jesuita.php';

    if (isset($_GET['id']) && !empty($_GET['nombre']) && !empty($_GET['firma'])) {
        $idJesuita = $_GET['id'];
        $nombre = $_GET['nombre'];
        $firma = $_GET['firma'];
    } else {
        echo "Los datos necesarios no se proporcionaron. <a href='mostrar_jesuita.php'>Volver a la lista de Jesuitas</a>";
    }
    ?>
    <h1>Editar Jesuita</h1>
    <form method="GET" action="modificar_jesuita2.php">
        <label for="id">Numero de puesto</label>
        <input type="text" name="id" value="<?php echo $idJesuita; ?>">
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>">
        <br>
        <label for="firma">Firma:</label>
        <input type="text" name="firma" value="<?php echo $firma; ?>">
        <br>
        <input type="submit" value="Guardar Cambios">
    </form>
    <a href="mostrar_jesuita.php">Volver a la lista de Jesuitas</a>
</body>
</html>

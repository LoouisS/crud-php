<?php
// Incluye la clase Jesuita y la conexión a la base de datos
require_once '..\includes\conexion_db.php';
require_once '..\includes\lugares.php';

if (isset($_GET['ip']) && !empty($_GET['lugar']) && !empty($_GET['descripcion'])) {
    $ipLugar = $_GET['ip'];
    $lugar = $_GET['lugar'];
    $descripcion = $_GET['descripcion'];
} else {
    echo "Los datos necesarios no se proporcionaron. <a href='mostrar_jesuita.php'>Volver a la lista de Jesuitas</a>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Jesuita</title>
</head>
<body>
    <h1>Editar Jesuita</h1>
    <form method="GET" action="modificar_lugar2.php">
        <label for="ip">IP:</label>
        <input type="text" name="ip" value="<?php echo $ipLugar; ?>">
        <br>
        <label for="lugar">Lugar:</label>
        <input type="text" name="lugar" value="<?php echo $lugar; ?>">
        <br>
        <label for="descripcion">Descripcion:</label>
        <input type="text" name="descripcion" value="<?php echo $descripcion; ?>">
        <br>
        <input type="submit" value="Guardar Cambios">
    </form>
    <a href="mostrar_lugar.php">Volver a la lista de Lugares</a>
</body>
</html>

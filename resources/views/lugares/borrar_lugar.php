<?php
// Incluye la clase Jesuita y la conexión a la base de datos
require_once '..\includes\conexion_db.php';
require_once '..\includes\lugares.php';

// Verifica si se ha enviado un ID Jesuita a través de la URL

echo "ID a eliminar: " . $_GET['ip'];
if (!empty($_GET['ip'])) {
    // Conectarse a la base de datos
    $db = new ConexionDB();
    $lugares = new Lugares($db);

    $ipLugar = $_GET['ip']; 

    echo "ID a eliminar: " . $ipLugar;
    
    // Intenta eliminar al Jesuita por su ID
    $mensaje = $lugares->delete($ipLugar);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Lugar</title>
</head>
<body>
    <h1>Eliminar Lugar</h1>
    <?php
    
    if (!empty($mensaje)) {
        echo "<p>$mensaje</p>";
    }
    ?>

    <a href="mostrar_lugares.php">Volver a la página de inicio</a>
</body>
</html>

<?php
// Incluye la clase Lugares y la conexión a la base de datos
require_once '..\includes\conexion_db.php';
require_once '..\includes\lugares.php';

$mensaje = "";

// Verifica si se han enviado datos del formulario
if (
    !empty($_POST['ip']) &&
    !empty($_POST['lugar']) &&
    !empty($_POST['descripcion'])
) {
    // Conectarse a la base de datos
    $db = new ConexionDB();
    $lugares = new Lugares($db);

    // Obtiene los datos del formulario
    $ip = $_POST['ip'];
    $lugar = $_POST['lugar'];
    $descripcion = $_POST['descripcion'];

    // Intenta agregar el nuevo Lugar
    $mensaje = $lugares->create($ip, $lugar, $descripcion);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Lugares</title>
</head>
<body>
    <h1>Crear Lugares</h1>

    <?php
    // Muestra el mensaje resultante de la creación del Lugares
    if (empty($mensaje)) {
        echo "<p>No dejes los campos vacíos</p>";
    } else {
        echo "<p>". $mensaje ."</p>";
    }
    ?>
    <a href="mostrar_lugares.php">Volver a la página de inicio</a>
</body>
</html>
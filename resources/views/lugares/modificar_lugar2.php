<?php
// Incluye la clase Jesuita y la conexión a la base de datos
require_once '..\includes\conexion_db.php';
require_once '..\includes\lugares.php';


if (!empty($_GET['lugar']) && !empty($_GET['descripcion'])) {
    $ipLugar = $_GET['ip'];
    $nuevoLugar = $_GET['lugar'];
    $nuevaDescripcion = $_GET['descripcion'];

    $db = new ConexionDB();
    $lugares = new Lugares($db);
    $resultado = $lugares->update($ipLugar, $nuevoLugar, $nuevaDescripcion);

    echo $resultado;
} else {
    echo "<p>No dejes los campos vacios animal</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Lugar</title>
</head>
<body>
    <br>
    <a href="mostrar_lugares.php">Volver a la lista de Lugares</a>
</body>
</html>

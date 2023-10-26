<?php
// Incluye la clase Jesuita y la conexión a la base de datos
require_once '..\includes\conexion_db.php';
require_once '..\includes\jesuita.php';


if (!empty($_GET['nombre']) && !empty($_GET['firma'])) {
    $idJesuita = $_GET['id'];
    $nuevoNombre = $_GET['nombre'];
    $nuevaFirma = $_GET['firma'];

    $db = new ConexionDB();
    $jesuita = new Jesuita($db);
    $resultado = $jesuita->update($idJesuita, $nuevoNombre, $nuevaFirma);

    echo $resultado;
} else {
    echo "<p>No dejes los campos vacios animal</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Jesuita</title>
</head>
<body>
    <br>
    <a href="mostrar_jesuita.php">Volver a la lista de Jesuitas</a>
</body>
</html>

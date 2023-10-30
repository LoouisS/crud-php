<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Jesuita</title>
</head>
<body>
    <h1>Eliminar Jesuita</h1>
    <?php
    // Incluye la clase Jesuita y la conexión a la base de datos
    require_once '..\..\..\app\Models\database_connector.php';
    require_once '..\..\..\app\Models\jesuita.php';

    // Verifica si se ha enviado un ID Jesuita a través de la URL
    if (isset($_GET['id'])) {
        // Conectarse a la base de datos
        $db = new DatabaseConnector();
        $jesuita = new Jesuita($db);

        $idJesuita = $_GET['id']; 
        
        // Intenta eliminar al Jesuita por su ID
        $mensaje = $jesuita->delete($idJesuita);
    }

    // Muestra el mensaje resultante de la eliminación
    if (isset($mensaje)) {
        echo "<p>$mensaje</p>";
    }
    ?>

    <a href="mostrar_jesuita.php">Volver a la página de inicio</a>
</body>
</html>

<!DOCTYPE html>
<html>

<body>
    <h1>Eliminar Lugar</h1>
    <?php
    ini_set('display_errors', 1);
    // Incluye la clase Jesuita y la conexión a la base de datos
    require_once getcwd() . '/app/Models/database_connector.php';
    require_once getcwd() . '/app/Models/lugares.php';

    // Verifica si se ha enviado un ID Jesuita a través de la URL

    if (!empty($_GET['ip'])) {
        // Conectarse a la base de datos
        $db = new DatabaseConnector();
        $lugares = new Lugares($db);

        $ipLugar = $_GET['ip']; 
        
        // Intenta eliminar al Jesuita por su ID
        $mensaje = $lugares->delete($ipLugar);
    }
    if (!empty($mensaje)) {
        echo "<p>$mensaje</p>";
    }
    ?>

    <a href="mostrar_lugares.php">Volver a la página de inicio</a>
</body>
</html>

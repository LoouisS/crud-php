<?php 


?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Visita</title>
</head>
<body>
    <h1>Crear Visita</h1>
    <?php
    require_once getcwd() . '/app/Models/database_connector.php';
    require_once getcwd() . '/app/Models/visitas.php';

    $db = new DatabaseConnector();
    $visitas = new Visitas($db);
    
    $idJesuita = $_POST['idJesuita'];
    $ipLugar = $_POST['ipLugar'];

    $mensaje = $visitas->registrarVisita($idJesuita, $ipLugar);
    // Muestra el mensaje resultante de la creación del Jesuita
    if (empty($mensaje)) {
        echo "<p>No dejes los campos vacíos</p>";
    } else {
        echo "<p>". $mensaje ."</p>";
    }
    ?>
    <a href="mostrar_visitas.php">Volver a la página de inicio</a>
</body>
</html>
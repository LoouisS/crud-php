<!DOCTYPE html>
<html>
<head>
    <title>Crear Jesuita</title>
</head>
<body>
    <h1>Crear Jesuita</h1>
    <?php

    // Incluye la clase Jesuita y la conexión a la base de datos
    require_once '..\..\..\app\Models\database_connector.php';
    require_once '..\..\..\app\Models\jesuita.php';


    // Verifica si se han enviado datos del formulario
    if (
        isset($_POST['idJesuita']) &&
        !empty($_POST['nombre']) &&
        !empty($_POST['firma'])
    ) {
        // Conectarse a la base de datos
        $db = new DatabaseConnector();
        $jesuita = new Jesuita($db);

        // Obtiene los datos del formulario
        $idJesuita = $_POST['idJesuita'];
        $nombre = $_POST['nombre'];
        $firma = $_POST['firma'];

        // Intenta agregar el nuevo Jesuita
        $mensaje = $jesuita->create($idJesuita, $nombre, $firma);
    }
    // Muestra el mensaje resultante de la creación del Jesuita
    if (empty($mensaje)) {
        echo "<p>No dejes los campos vacíos</p>";
    } else {
        echo "<p>". $mensaje ."</p>";
    }
    ?>
    <a href="mostrar_jesuita.php">Volver a la página de inicio</a>
</body>
</html>

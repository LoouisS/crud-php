<!DOCTYPE html>
<html>
<head>
    <title>Editar Lugar</title>
</head>
<body>
    <?php
    // Incluye la clase Jesuita y la conexión a la base de datos
    require_once getcwd() . 'app\Models\database_connector.php';
    require_once getcwd() . 'app\Models\lugares.php';

    if (!empty($_GET['ip'])&& !empty($_GET['lugar'])) {
        $ipLugar = $_GET['ip'];
        $nuevoLugar = $_GET['lugar'];
        $nuevaDescripcion = $_GET['descripcion'];
        $nuevaIP = $_GET['ip']; 

        $db = new DatabaseConnector();
        $lugares = new Lugares($db);
        $resultado = $lugares->update($ipLugar, $nuevoLugar, $nuevaDescripcion);

        echo $resultado;
    } else {
        echo "<p>No dejes los campos vacios animal</p>";
    }
    ?>
    <br>
    <a href="mostrar_lugares.php">Volver a la lista de Lugares</a>
</body>
</html>

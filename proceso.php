<?php
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    if ($accion === 'modificar') {
        $ip = $_GET['ip'];
        $lugar = $_GET['lugar'];
        $descripcion = $_GET['descripcion'];
        header("Location: modificar_lugar.php?ip=" . $ip . "&lugar=" . $lugar . "&descripcion=" . $descripcion);
        exit();
    } elseif ($accion === 'borrar') {
        header("Location: borrar_lugar.php?ip=" . $_GET['ip']);
        exit;
    } 
} 

?>

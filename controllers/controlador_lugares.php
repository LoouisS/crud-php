<?php
require_once getcwd() . '/../app/models/database_connector.php';
require_once 'lugares.php'; // Arreglar tambien

class LugaresController {
    private $db;
    private $lugares;

    public function __construct($db) {
        $this->db = $db;
        $this->lugares = new Lugares($this->db);
    }

    public function read() {
        // Obtener los datos de los lugares
        $lugares = $this->lugares->read();
        // Redirigir a la vista de mostrar lugares con los datos. Probar con el include aqui al final tambien
        // header("Location: arreglar_ruta);
        exit();
    }

    public function create() {
        // Procesar el formulario de creación aquí (por ejemplo, desde POST)

        $ip = $_POST['ip'];
        $lugar = $_POST['lugar'];
        $descripcion = $_POST['descripcion'];

        $mensaje = $this->lugares->create($ip, $lugar, $descripcion);

        // Redirigir a la página de listado con un mensaje
        // header("Location: arreglar_ruta);
        exit();

    }

    public function update() {
        // Procesar el formulario de actualización aquí (por ejemplo, desde POST)

        $ip = $_POST['ip'];
        $lugar = $_POST['lugar'];
        $descripcion = $_POST['descripcion'];

        $mensaje = $this->lugares->update($ip, $lugar, $descripcion);

        // Redirigir a la página de listado con un mensaje
        // header("Location: arreglar_ruta);
        exit();

    }

    public function delete() {
        // Obtener el IP de la URL
        $ip = $_GET['ip'];

        $mensaje = $this->lugares->delete($ip);

        // Redirigir a la página de listado con un mensaje
        // header("Location: arreglar_ruta);
        exit();
    }
}

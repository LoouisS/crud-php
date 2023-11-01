<?php
    require_once getcwd() . '/config/configdb.php'; 

    class DatabaseConnector {
        public $conexion;
        public function __construct() {
            $this->conexion = new mysqli(HOST, USER, PASSWORD, DB_NAME);
            $this->conexion->set_charset("UTF8");
            if ($this->conexion->connect_error) {
                die("Error de conexión: " . $this->conexion->connect_error);
            }
        }
    }
?>
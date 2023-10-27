<?php
class Visitas {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function read() {
        try {
            $sql = "SELECT v.idVisita, j.nombre AS nombreJesuita, v.fechaHora, l.lugar AS nombreLugar
            FROM visita v
            INNER JOIN jesuita j ON v.idJesuita = j.idJesuita
            INNER JOIN lugar l ON v.ip = l.ip
            ORDER BY v.fechaHora DESC
            LIMIT 5;";

            $result = $this->db->conexion->query($sql);

            $visitas = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $visitas[] = $row;
                }
            }
            return $visitas;
        } catch (Exception $e) {
            $mensaje = "Ocurrió un error: " . $e->getMessage();
            return $mensaje;
        }
    }

    public function obtenerJesuitas() {
        $sql = "SELECT idJesuita, nombre FROM jesuita";
        $result = $this->db->conexion->query($sql);

        $jesuitas = array();
        while ($row = $result->fetch_assoc()) {
            $jesuitas[$row['idJesuita']] = $row['nombre'];
        }

        return $jesuitas;
    }

    public function obtenerLugares() {
        $sql = "SELECT ip, lugar FROM lugar";
        $result = $this->db->conexion->query($sql);

        $lugares = array();
        while ($row = $result->fetch_assoc()) {
            $lugares[$row['ip']] = $row['lugar'];
        }

        return $lugares;
    }

    public function registrarVisita($idJesuita, $ipLugar) {
        try {
            // Insertar el nuevo Jesuita
            $sql = "INSERT INTO visita (idJesuita, ip) VALUES ($idJesuita, '$ipLugar')";
    
            if ($this->db->conexion->query($sql)) {
                $mensaje = "Visita realizada exitosamente.";
                return $mensaje;
            } 
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) { // El código 1062 corresponde a una clave duplicada
                $mensaje = "<p>No puedes visitar un sitios dos veces te ha caducao el pasaporte</p>";
                return $mensaje;
            } else {
                $mensaje = "<p>Ocurrio un error inesperado</p>";
                return  $mensaje;
            }
        }
    }

    
}
?>

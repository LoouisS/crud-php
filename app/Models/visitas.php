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
}
?>

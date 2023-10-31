<?php
class Lugares {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($ip, $lugar, $descripcion) {
        try {
            $sql = "INSERT INTO lugar (ip, lugar, descripcion) VALUES ('$ip', '$lugar', '$descripcion')";
            if ($this->db->conexion->query($sql)) {
                $mensaje = "Lugar con IP $ip ha sido agregado exitosamente.";
                return $mensaje;
            } 
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                $mensaje = "<p>Este lugar ya esta registrado</p>";
                return $mensaje;
            } else {
                $mensaje = "<p>Ocurrió un error inesperado</p>";
                return $mensaje;
            }
        }
    }

    public function read($ip = null) {
        $mensaje = "";
        try {
            $sql = "SELECT ip, lugar, descripcion FROM lugar";

            if ($ip !== null) {
                $sql .= " WHERE ip = '$ip'";
            }

            $result = $this->db->conexion->query($sql);

            $lugares = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $lugares[] = $row;
                }
            }
            return $lugares;
        } catch (Exception $e) {
            $mensaje = "Ocurrió un error: " . $e->getMessage();
            return $mensaje;
        }
    }

    public function update($ip, $nuevolugar, $nuevadescripcion) {
        $mensaje = "";
        try {
            $sql = "UPDATE lugar SET lugar = '$nuevolugar', descripcion = '$nuevadescripcion' WHERE ip = '$ip'";

            if ($this->db->conexion->query($sql)) {
                $mensaje = "Lugar con IP $ip ha sido actualizado exitosamente.";
            } else {
                $mensaje = "Ocurrió un error al intentar actualizar el lugar.";
            }
        } catch (Exception $e) {
            $mensaje = "Ocurrió un error: " . $e->getMessage();
        }
        return $mensaje;
    }

    public function delete($ip) {
        
        // TODO Validar la IP
        // Conectarse a la base de datos
        $conexion = $this->db->conexion;
        // TODO Fixear y mejorar este trozo del codigo
        $sql = "DELETE FROM lugar WHERE ip = '$ip'";
        if ($conexion->query($sql)) {
            if ($conexion->affected_rows > 0) {
                $mensaje = "Lugar con IP '$ip' ha sido eliminado exitosamente.";
            } else {
                $mensaje = "No existe un Lugar con el IP proporcionado.";
            }
        }
        return $mensaje;
    }
}
?>

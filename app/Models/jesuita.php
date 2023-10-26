<?php
class Jesuita {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($idJesuita, $nombre, $firma) {
        try {
            // Insertar el nuevo Jesuita
            $sql = "INSERT INTO jesuita (idJesuita, nombre, firma) VALUES ($idJesuita, '$nombre', '$firma')";
    
            if ($this->db->conexion->query($sql)) {
                $mensaje = "Jesuita con ID $idJesuita ha sido agregado exitosamente.";
                return $mensaje;
            } 
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) { // El código 1062 corresponde a una clave duplicada
                $mensaje = "<p>El ID del Jesuita proporcionado ya existe</p>";
                return $mensaje;
            } else {
                $mensaje = "<p>Ocurrio un error inesperado</p>";
                return  $mensaje;
            }
        }
    }

    public function read($idJesuita = null) {
        try {
            $sql = "SELECT idJesuita, nombre, firma FROM jesuita";
            
            if ($idJesuita !== null) {
                $sql .= " WHERE idJesuita = $idJesuita";
            }
    
            $result = $this->db->conexion->query($sql);
    
            $jesuitas = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $jesuitas[] = $row;
                }
            }
            return $jesuitas;
        } catch (Exception $e) {
            $mensaje = "Ocurrió un error: " . $e->getMessage();
            return $mensaje;
        }
    }
    public function update($idJesuita, $nuevoNombre, $nuevaFirma) {
        try {
            // Verificar si el ID Jesuita es un número entero
            if (!is_numeric($idJesuita)) {
                $mensaje = "El ID Jesuita debe ser un número entero.";
                return $mensaje;
            }
    
            $sql = "UPDATE jesuita SET nombre = '$nuevoNombre', firma = '$nuevaFirma' WHERE idJesuita = $idJesuita";
    
            if ($this->db->conexion->query($sql)) {
                $mensaje = "Jesuita con ID $idJesuita ha sido actualizado exitosamente.";
                return $mensaje;
            } else {
                return "Ocurrió un error al intentar actualizar el Jesuita.";
            }
        } catch (Exception $e) {
            $mensaje = "Ocurrió un error: " . $e->getMessage();
            return $mensaje;
        }
    } 

    public function delete($idJesuita) {
        // Verificar si el ID Jesuita es un número entero
        if (!is_numeric($idJesuita)) {
            $mensaje = "El ID Jesuita debe ser un número entero.";
            return $mensaje;
        }
    
        $conexion = $this->db->conexion;
    
        $sql = "DELETE FROM jesuita WHERE idJesuita = $idJesuita";
        
        if ($conexion->query($sql)) {
            if ($conexion->affected_rows > 0) {
                $mensaje = "Jesuita con ID $idJesuita ha sido eliminado exitosamente.";
                return $mensaje;
            } else {
                $mensaje = "No existe un Jesuita con el ID proporcionado.";
                return $mensaje;
            }
        }
    }
}
?>



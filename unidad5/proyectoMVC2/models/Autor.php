<?php
require_once "config.php";

class Autor {
    private $id;
    private $nombre;

    public function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public static function obtenerTodos() {
        $conexion = obtenerConexion();
        $stmt = $conexion->prepare("SELECT * FROM autores");
        $stmt->execute();
        
        $autores = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $autores[] = new Autor($fila['id'], $fila['nombre']);
        }
        return $autores;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }
}
?>

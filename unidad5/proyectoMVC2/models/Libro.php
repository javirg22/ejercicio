<?php
require_once "config.php";
require_once "Autor.php";

class Libro {
    private $id;
    private $titulo;
    private $autorId;

    public function __construct($id, $titulo, $autorId) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->autorId = $autorId;
    }

    public static function obtenerTodos() {
        $conexion = obtenerConexion();
        $stmt = $conexion->prepare("SELECT * FROM libros");
        $stmt->execute();

        $libros = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $libros[] = new Libro($fila['id'], $fila['titulo'], $fila['autor_id']);
        }
        return $libros;
    }

    public static function crear($titulo, $autorId) {
        $conexion = obtenerConexion();
        $stmt = $conexion->prepare("INSERT INTO libros (titulo, autor_id) VALUES (:titulo, :autor_id)");
        return $stmt->execute([':titulo' => $titulo, ':autor_id' => $autorId]);
    }

    public static function eliminar($id) {
        $conexion = obtenerConexion();
        $stmt = $conexion->prepare("DELETE FROM libros WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutorId() {
        return $this->autorId;
    }

    public function getAutorNombre() {
        $autor = Autor::obtenerTodos(); // Simplemente para mostrar el uso
        foreach ($autor as $a) {
            if ($a->getId() == $this->autorId) return $a->getNombre();
        }
        return null;
    }
}
?>

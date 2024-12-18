// models/Usuario.php
<?php
class Usuario {
    private $id;
    private $nombre;
    private $email;

    public function __construct($id, $nombre, $email) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
    }

    // Método que simula la obtención de usuarios desde la base de datos
    public static function obtenerTodos() {
        // Datos simulados, en un caso real, aquí iría la consulta a la base de datos
        return [
            new Usuario(1, "Juan Perez", "juan@example.com"),
            new Usuario(2, "Maria Lopez", "maria@example.com"),
            new Usuario(3, "Mara Lopez", "mara@example.com")
        ];
    }

    // Métodos para obtener las propiedades de la clase
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }
}
?>
<?php

class Usuario {
    public $nombre;
    public $email;
    private $conexionBD;

    // Constructor donde simulamos una conexión a la base de datos
    public function __construct($nombre, $email) {
        $this->nombre = $nombre;
        $this->email = $email;
        // Simulamos una conexión a la base de datos
        $this->conexionBD = "Conexión a la base de datos establecida.";
    }

    // Método mágico __sleep() para serializar el objeto
    public function __sleep() {
        // No serializamos la propiedad conexionBD
        return ['nombre', 'email'];
    }

    // Método mágico __wakeup() para simular la reconexión al deserializar
    public function __wakeup() {
        // Simulamos la reconexión a la base de datos
        $this->conexionBD = "Conexión a la base de datos restablecida.";
    }

    // Método para obtener el estado de la conexión a la base de datos
    public function obtenerConexion() {
        return $this->conexionBD;
    }
}

// Creación de un objeto Usuario
$usuario = new Usuario("Juan Pérez", "juan@example.com");

// Serialización del objeto
$usuarioSerializado = serialize($usuario);

// Deserialización del objeto
$usuarioDeserializado = unserialize($usuarioSerializado);

// Mostramos los resultados
echo "Usuario original:\n";
echo "Nombre: " . $usuario->nombre . "\n";
echo "Email: " . $usuario->email . "\n";
echo "Conexión: " . $usuario->obtenerConexion() . "\n\n<br><br>";

echo "Usuario deserializado:\n";
echo "Nombre: " . $usuarioDeserializado->nombre . "\n";
echo "Email: " . $usuarioDeserializado->email . "\n";
echo "Conexión: " . $usuarioDeserializado->obtenerConexion() . "\n";

?>

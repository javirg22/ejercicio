<?php
class Usuario {
    private $nombre;
    private $email;

    public function __construct($nombre, $email) {
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function mostrarInformacion() {
        echo "Nombre: {$this->nombre}, Email: {$this->email}<br>";
    }
}

// Crear una instancia de la clase Usuario
$usuario = new Usuario("Juan", "juan@example.com");

// Serializar el objeto $usuario a una cadena
$cadenaSerializada = serialize($usuario);
echo "Objeto serializado: " . $cadenaSerializada . "<br>";

// Deserializar la cadena para recuperar el objeto
$usuarioDeserializado = unserialize($cadenaSerializada);
$usuarioDeserializado->mostrarInformacion();
?>
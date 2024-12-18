<?php
class ConexionBaseDatos {
    private $host;
    private $usuario;
    private $password;
    private $conexion;

    public function __construct($host, $usuario, $password) {
        $this->host = $host;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->conectar();
    }

    private function conectar() {
        // Simulación de conexión (esto normalmente sería una conexión real)
        $this->conexion = "Conectado a {$this->host} como {$this->usuario}";
        echo "Conexión establecida<br>";
    }

    public function __sleep() {
        // No serializamos la conexión activa
        return ['host', 'usuario', 'password'];
    }

    public function __wakeup() {
        // Reconectar a la base de datos al deserializar
        $this->conectar();
    }

    public function mostrarConexion() {
        echo $this->conexion . "<br>";
    }
}

// Crear una instancia de ConexionBaseDatos
$conexion = new ConexionBaseDatos("localhost", "root", "1234");

// Serializar el objeto
$cadenaSerializada = serialize($conexion);
echo "Objeto serializado: " . $cadenaSerializada . "<br>";

// Deserializar el objeto
$conexionDeserializada = unserialize($cadenaSerializada);
$conexionDeserializada->mostrarConexion();
?>
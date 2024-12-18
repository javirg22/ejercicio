<?php
class Persona {
    private $nombre;

    // Constructor
    public function __construct($nombre) {
        $this->nombre = $nombre;
        echo "Objeto creado para {$this->nombre}.<br>";
    }

    // Destructor
    public function __destruct() {
        echo "Objeto destruido para {$this->nombre}.<br>";
    }

    // Método para mostrar el nombre
    public function mostrarNombre() {
        echo "El nombre es: " . $this->nombre . "<br>";
    }
}

// Crear una instancia de la clase Persona
$persona1 = new Persona("Juan");
$persona1->mostrarNombre();

// Crear otra instancia
$persona2 = new Persona("María");
$persona2->mostrarNombre();

// Los destructores se llaman automáticamente al final del script o cuando se destruyen los objetos
?>
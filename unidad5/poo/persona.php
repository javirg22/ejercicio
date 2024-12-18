<?php
// Definición de la clase Persona
class Persona {
    // Atributos (propiedades)
    private $nombre;
    private $edad;

    // Constructor
    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    // Método para obtener el nombre
    public function getNombre() {
        return $this->nombre;
    }

    // Método para establecer un nuevo nombre
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Método para obtener la edad
    public function getEdad() {
        return $this->edad;
    }

    // Método para establecer una nueva edad
    public function setEdad($edad) {
        $this->edad = $edad;
    }

    // Método para mostrar información de la persona
    public function mostrarInfo() {
        echo "Nombre: " . $this->nombre . ", Edad: " . $this->edad . " años<br>";
    }
}

// Crear instancias de la clase Persona
$persona1 = new Persona("Juan", 30);
$persona2 = new Persona("María", 25);

// Mostrar información de las personas
$persona1->mostrarInfo();
$persona2->mostrarInfo();

// Cambiar el nombre de persona1 y mostrar de nuevo
$persona1->setNombre("Juan Carlos");
$persona1->mostrarInfo();
?>
<?php
class Persona {
    // Propiedad
    protected $nombre;

    // Constructor que inicializa el nombre
    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    // Método final
    final public function identificar() {
        echo "Esta persona es: " . $this->nombre;
    }
}

// Subclase Empleado que hereda de Persona
class Empleado extends Persona {
    // Propiedad adicional
    private $puesto;

    // Constructor que inicializa nombre y puesto
    public function __construct($nombre, $puesto) {
        parent::__construct($nombre); // Llamada al constructor de la clase base
        $this->puesto = $puesto;
    }

    // Intento de sobrescribir el método final (esto causará un error)
    //public function identificar() {
       // echo "Empleado: " . $this->nombre . ", Puesto: " . $this->puesto;
  //  }
}

// Ejemplo de uso
$empleado = new Empleado("Carlos", "Gerente");
$empleado->identificar(); // Esto causará un error porque identificar() es final
?>

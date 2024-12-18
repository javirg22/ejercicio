<?php

// Clase abstracta Empleado
abstract class Empleado {
    protected $nombre;
    protected $salarioBase;

    public function __construct($nombre, $salarioBase) {
        $this->nombre = $nombre;
        $this->salarioBase = $salarioBase;
    }

    // Método abstracto que las subclases deben implementar
    abstract public function calcularSalarioTotal();

    // Método concreto que muestra la información del empleado
    public function mostrarInformacion() {
        echo "Nombre: $this->nombre, Salario Total: " . $this->calcularSalarioTotal() . "<br>";;
    }
}

// Subclase EmpleadoBase sin bonificación
class EmpleadoBase extends Empleado {
    public function calcularSalarioTotal() {
        return $this->salarioBase;
    }
}

// Subclase EmpleadoConBonificacion con bonificación
class EmpleadoConBonificacion extends Empleado {
    private $bonificacion;

    public function __construct($nombre, $salarioBase, $bonificacion) {
        parent::__construct($nombre, $salarioBase);
        $this->bonificacion = $bonificacion;
    }

    public function calcularSalarioTotal() {
        return $this->salarioBase + $this->bonificacion;
    }
}

// Ejemplo de uso
$empleado1 = new EmpleadoBase("Juan", 3000);
$empleado2 = new EmpleadoConBonificacion("Ana", 3000, 500);

$empleado1->mostrarInformacion(); // Salida: Nombre: Juan, Salario Total: 3000
$empleado2->mostrarInformacion(); // Salida: Nombre: Ana, Salario Total: 4000

?>
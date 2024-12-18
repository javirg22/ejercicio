<?php

// Clase base Empleado
class Empleado {
    // Propiedad
    protected $nombre;

    // Constructor
    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    // Método para calcular el salario (salario básico)
    public function calcularSalario() {
        return 1000; // Salario básico
    }

    // Método para mostrar información del empleado
    public function mostrarInformacion() {
        echo "Nombre: $this->nombre, Salario: " . $this->calcularSalario() . "<br>";
    }
}

// Clase EmpleadoTiempoCompleto que hereda de Empleado
class EmpleadoTiempoCompleto extends Empleado {
    // Sobrescritura del método calcularSalario
    public function calcularSalario() {
        return parent::calcularSalario() * 1.5; // Salario base multiplicado por 1.5
    }
}

// Clase EmpleadoMedioTiempo que hereda de Empleado
class EmpleadoMedioTiempo extends Empleado {
    // Sobrescritura del método calcularSalario
    public function calcularSalario() {
        return parent::calcularSalario() / 2; // Salario base dividido entre 2
    }
}

// Ejemplo de uso
$empleado = new Empleado("Pablo");
$empleadoTiempoCompleto = new EmpleadoTiempoCompleto("Juan Pérez");
$empleadoMedioTiempo = new EmpleadoMedioTiempo("Ana Gómez");

$empleado->mostrarInformacion(); // Mostrará el salario base
$empleadoTiempoCompleto->mostrarInformacion(); // Salario base * 1.5
$empleadoMedioTiempo->mostrarInformacion(); // Salario base / 2
?>

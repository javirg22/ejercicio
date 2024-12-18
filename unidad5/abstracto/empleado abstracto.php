<?php
// Clase base Empleado
 abstract class Empleado {
    // Propiedad
    protected $nombre;

    // Constructor
    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    // Método para calcular el salario (salario básico)
   abstract public function calcularSalario();

    // Método para mostrar información del empleado
    public function mostrarInformacion() {
        echo "Nombre: $this->nombre, Salario: " . $this->calcularSalario() . "<br>";
    }
}

// Clase EmpleadoTiempoCompleto que hereda de Empleado
class EmpleadoTiempoCompleto extends Empleado {
   
    public function calcularSalario() {
        return 3000;
    }
        
}

// Clase EmpleadoMedioTiempo que hereda de Empleado
class EmpleadoMedioTiempo extends Empleado {
    
    public function calcularSalario(){
      return 1500;
    }
        
}

// Ejemplo de uso
$empleadoTiempoCompleto = new EmpleadoTiempoCompleto("Juan Pérez");
$empleadoMedioTiempo = new EmpleadoMedioTiempo("Ana Gómez");

$empleadoTiempoCompleto->mostrarInformacion(); 
$empleadoMedioTiempo->mostrarInformacion();
?>

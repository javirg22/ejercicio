<?php

// Clase base Figura
class Figura {
    // Método base que puede ser sobrescrito en las clases hijas
    public function calcularArea() {
        return 0;
    }
}

// Clase Cuadrado que hereda de Figura
class Cuadrado extends Figura {
    // Propiedad
    private $lado;

    // Constructor
    public function __construct($lado) {
        $this->lado = $lado;
    }

    // Método para calcular el área del cuadrado
    public function calcularArea() {
        return $this->lado * $this->lado;
    }
}

// Clase Círculo que hereda de Figura
class Circulo extends Figura {
    // Propiedad
    private $radio;

    // Constructor
    public function __construct($radio) {
        $this->radio = $radio;
    }

    // Método para calcular el área del círculo
    public function calcularArea() {
        return pi() * $this->radio * $this->radio;
    }
}

// Ejemplo de uso
$cuadrado = new Cuadrado(4);
echo "El área del cuadrado es: " . $cuadrado->calcularArea() . "<br>";

$circulo = new Circulo(2);
echo "El área del círculo es: " . $circulo->calcularArea() . "<br>";
?>

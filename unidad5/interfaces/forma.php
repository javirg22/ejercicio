<?php

// Definición de la interfaz Forma
interface Forma {
    public function calcularArea();
    public function calcularPerimetro();
}

// Clase Rectangulo que implementa la interfaz Forma
class Rectangulo implements Forma {
    private $ancho;
    private $alto;

    public function __construct($ancho, $alto) {
        $this->ancho = $ancho;
        $this->alto = $alto;
    }

    public function calcularArea() {
        return $this->ancho * $this->alto;
    }

    public function calcularPerimetro() {
        return 2 * ($this->ancho + $this->alto);
    }
}

// Clase Circulo que implementa la interfaz Forma
class Circulo implements Forma {
    private $radio;

    public function __construct($radio) {
        $this->radio = $radio;
    }

    public function calcularArea() {
        return pi() * pow($this->radio, 2);
    }

    public function calcularPerimetro() {
        return 2 * pi() * $this->radio;
    }
}

// Ejemplo de uso
$rectangulo = new Rectangulo(4, 5);
$circulo = new Circulo(3);

echo "Área del Rectángulo: " . $rectangulo->calcularArea() . "<br>";
echo "Perímetro del Rectángulo: " . $rectangulo->calcularPerimetro() . "<br>"; 

echo "Área del Círculo: " . $circulo->calcularArea() . "<br>"; 
echo "Perímetro del Círculo: " . $circulo->calcularPerimetro() . "<br>"; 

?>

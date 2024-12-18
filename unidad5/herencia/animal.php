<?php

// Clase base Animal
class Animal {
    // Propiedad
    protected $nombre;

    // Constructor
    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    // Método hacerSonido
    public function hacerSonido() {
        echo "El animal hace un sonido<br>";
    }
}

// Clase hija Perro que hereda de Animal
class Perro extends Animal {

    // Sobrescritura del método hacerSonido
    public function hacerSonido() {
        echo "El perro ladra<br>";
    }
}

// Ejemplo de uso
$animal = new Animal("Animal");
$animal->hacerSonido(); // Llama al método de la clase base

$perro = new Perro("Rex");
$perro->hacerSonido(); // Llama al método sobrescrito en la clase Perro
?>

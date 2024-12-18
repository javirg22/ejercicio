<?php
// Definir una clase abstracta
abstract class Animal {
    public $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    // Método abstracto que debe implementarse en las clases hijas
    abstract public function hacerSonido();

    // Método concreto
    public function describir() {
        echo "Este es un animal llamado " . $this->nombre . ".<br>";
    }
}

// Clase hija Perro que implementa el método abstracto hacerSonido()
class Perro extends Animal {
    public function hacerSonido() {
        echo "Guau! Guau!<br>";
    }
}

// Clase hija Gato que implementa el método abstracto hacerSonido()
class Gato extends Animal {
    public function hacerSonido() {
        echo "Miau! Miau!<br>";
    }
}

// Crear instancias de Perro y Gato
$Perro = new Perro("Rex");
$Gato = new Gato("Misu");

$Perro->describir(); // Salida: Este es un animal llamado Rex.
$Perro->hacerSonido(); // Salida: Guau! Guau!

$Gato->describir(); // Salida: Este es un animal llamado Misu.
$Gato->hacerSonido(); // Salida: Miau! Miau!
?>
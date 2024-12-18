<?php
// Definición de la clase Producto
class Producto {
    // Atributos (propiedades)
    private $nombre;
    private $precio;

    // Constructor
    public function __construct($nombre, $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    // Método para obtener el nombre
    public function getNombre() {
        return $this->nombre;
    }

    // Método para establecer un nuevo nombre
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Método para obtener el precio
    public function getPrecio() {
        return $this->precio;
    }

    // Método para establecer un nuevo precio
    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    // Método para mostrar información del producto
    public function mostrarInfo() {
        echo "Nombre: " . $this->nombre . ", precio: " . $this->precio . " $<br>";
    }
}

// Crear instancias de la clase Producto
$producto1 = new Producto("chocolate", 3.0);
$producto2 = new Producto("leche", 2.5);

// Mostrar información de los productos
$producto1->mostrarInfo();
$producto2->mostrarInfo();

// Cambiar el precio  y mostrar de nuevo
$producto1->setPrecio(2.9);
$producto1->mostrarInfo();
?>
<?php
// Clase Producto
class Producto {
    public $nombre;
    public $precio;
    public $cantidad;

    public function __construct($nombre, $precio, $cantidad) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
    }
}

// Crear un objeto de Producto y asignarle valores
$producto = new Producto("portatil", 1200.99, 10);

// Serializar el objeto
$producto_serializado = serialize($producto);
echo "Objeto serializado: " . $producto_serializado . "\n\n";

// Deserializar el objeto
$producto_deserializado = unserialize($producto_serializado);

// Mostrar las propiedades del objeto deserializado
echo "<br>Objeto deserializado:\n";
echo "Nombre: " . $producto_deserializado->nombre . "\n";
echo "Precio: $" . $producto_deserializado->precio . "\n";
echo "Cantidad: " . $producto_deserializado->cantidad . "\n";
?>

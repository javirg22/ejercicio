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

// Clase Carrito
class Carrito {
    public $productos = []; // Array para almacenar productos

    // Método para agregar productos al carrito
    public function agregarProducto(Producto $producto) {
        $this->productos[] = $producto;
    }

    // Método para mostrar los productos en el carrito
    public function mostrarCarrito() {
        if (empty($this->productos)) {
            echo "El carrito está vacío.\n";
        } else {
            foreach ($this->productos as $producto) {
                echo "Producto: {$producto->nombre}, Precio: \${$producto->precio}, Cantidad: {$producto->cantidad}\n";
            }
        }
    }
}

// Crear una instancia de Carrito
$carrito = new Carrito();

// Crear productos y agregarlos al carrito
$producto1 = new Producto("Laptop", 1200.99, 1);
$producto2 = new Producto("Mouse", 25.50, 2);

$carrito->agregarProducto($producto1);
$carrito->agregarProducto($producto2);

// Mostrar los productos en el carrito antes de la serialización
echo "Carrito antes de la serialización:\n";
$carrito->mostrarCarrito();

// Serializar el objeto Carrito
$carrito_serializado = serialize($carrito);
echo "\nCarrito serializado:\n" . $carrito_serializado . "\n <br><br>";

// Deserializar el objeto Carrito
$carrito_deserializado = unserialize($carrito_serializado);

// Mostrar los productos en el carrito después de la deserialización
echo "\nCarrito después de la deserialización:\n";
$carrito_deserializado->mostrarCarrito();
?>

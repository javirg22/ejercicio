<?php
// Configuración de cabeceras para manejo de JSON
header('Content-Type: application/json');

// Inventario simulado (almacenado temporalmente en un array)
$inventario = [];

// Función para añadir un producto al inventario
function añadirProducto($producto) {
    global $inventario;

    // Validar que el producto tenga los campos requeridos
    if (!isset($producto['id'], $producto['nombre'], $producto['cantidad'], $producto['precio'])) {
        return ['error' => 'Faltan datos obligatorios del producto'];
    }

    // Añadir el producto al inventario
    $inventario[] = $producto;
    return ['mensaje' => 'Producto añadido con éxito', 'producto' => $producto];
}

// Función para calcular el valor total del inventario
function calcularValorTotal() {
    global $inventario;

    $valorTotal = 0;
    foreach ($inventario as $producto) {
        $valorTotal += $producto['cantidad'] * $producto['precio'];
    }
    return ['mensaje' => 'Valor total del inventario calculado', 'valor_total' => $valorTotal];
}

// Función para identificar productos con cantidad baja
function productosConCantidadBaja() {
    global $inventario;

    $productosBajos = array_filter($inventario, function($producto) {
        return $producto['cantidad'] < 5;
    });
    return ['mensaje' => 'Productos con cantidad baja', 'productos' => array_values($productosBajos)];
}

// Procesar solicitud
$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo === 'POST') {
    // Leer datos del cuerpo de la solicitud
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['accion'])) {
        switch ($data['accion']) {
            case 'añadir':
                if (isset($data['producto'])) {
                    $resultado = añadirProducto($data['producto']);
                } else {
                    $resultado = ['error' => 'No se proporcionó el producto'];
                }
                break;

            case 'calcular_valor':
                $resultado = calcularValorTotal();
                break;

            case 'productos_bajos':
                $resultado = productosConCantidadBaja();
                break;

            default:
                $resultado = ['error' => 'Acción no válida'];
        }
    } else {
        $resultado = ['error' => 'No se especificó ninguna acción'];
    }
} else {
    $resultado = ['error' => 'Método no permitido. Use POST'];
}

// Enviar respuesta como JSON
echo json_encode($resultado);
?>

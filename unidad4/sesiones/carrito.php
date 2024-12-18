<?php
session_start();

// Definir algunos productos de ejemplo para mostrar sus detalles
$productos = [
    1 => ["nombre" => "Producto 1", "precio" => 10.00],
    2 => ["nombre" => "Producto 2", "precio" => 20.00],
    3 => ["nombre" => "Producto 3", "precio" => 30.00]
];

$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
$total = 0; // Variable para almacenar el total del carrito
?>

<!DOCTYPE html>
<html>
<head>
    <title>Carrito</title>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <?php if (!empty($carrito)): ?>
        <ul>
            <?php foreach ($carrito as $id => $cantidad): ?>
                <li>
                    <?php echo $productos[$id]['nombre']; ?> - Cantidad: <?php echo $cantidad; ?>
                    - Precio: $<?php echo $productos[$id]['precio'] * $cantidad; ?>
                </li>
                <?php $total += $productos[$id]['precio'] * $cantidad; // Sumar al total ?>
            <?php endforeach; ?>
        </ul>
        <p><strong>Total: $<?php echo number_format($total, 2); ?></strong></p> <!-- Mostrar el total con dos decimales -->
        <a href="vaciar_carrito.php">Vaciar Carrito</a>
    <?php else: ?>
        <p>El carrito está vacío.</p>
    <?php endif; ?>
    <a href="productos.php">Volver a Productos</a>
</body>
</html>



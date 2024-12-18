<?php
session_start();

// Definir algunos productos de ejemplo
$productos = [
    1 => ["nombre" => "Producto 1", "precio" => 10.00],
    2 => ["nombre" => "Producto 2", "precio" => 20.00],
    3 => ["nombre" => "Producto 3", "precio" => 30.00]
];

// Agregar producto al carrito
if (isset($_POST['producto_id'])) {
    $producto_id = $_POST['producto_id'];
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
    if (isset($_SESSION['carrito'][$producto_id])) {
        $_SESSION['carrito'][$producto_id]++;
    } else {
        $_SESSION['carrito'][$producto_id] = 1;
    }
    echo "<p>Producto añadido al carrito!</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <ul>
        <?php foreach ($productos as $id => $producto): ?>
            <li>
                <strong><?php echo $producto['nombre']; ?></strong> - $<?php echo $producto['precio']; ?>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="producto_id" value="<?php echo $id; ?>">
                    <button type="submit">Agregar al carrito</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="carrito.php">Ver Carrito</a>
</body>
</html>

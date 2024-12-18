<?php
include 'bd.php';

// Obtener todos los productos con sus categorías
$sql = "SELECT productos.id, productos.nombre AS producto_nombre, productos.precio, categorias.nombre AS categoria_nombre
        FROM productos
        LEFT JOIN categorias ON productos.id_categoria = categorias.id";
$stmt = $pdo->query($sql);
$productos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Productos</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Lista de Productos</h1>
    <a href="crear.php">Añadir nuevo producto</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= htmlspecialchars($producto['id']) ?></td>
                <td><?= htmlspecialchars($producto['producto_nombre']) ?></td>
                <td><?= htmlspecialchars($producto['precio']) ?></td>
                <td><?= htmlspecialchars($producto['categoria_nombre'] ?? 'Sin categoría') ?></td>
                <td>
                    <a href="editar.php?id=<?= $producto['id'] ?>">Editar</a>
                    <a href="eliminar.php?id=<?= $producto['id'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

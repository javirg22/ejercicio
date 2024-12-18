<?php
include 'bd.php';

// Obtener el producto a editar
$id = $_GET['id'];
$sql = "SELECT * FROM productos WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$producto = $stmt->fetch();

// Obtener todas las categorías
$sql = "SELECT * FROM categorias";
$stmt = $pdo->query($sql);
$categorias = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $id_categoria = $_POST['id_categoria'];

    // Actualizar producto
    $sql = "UPDATE productos SET nombre = ?, precio = ?, id_categoria = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $precio, $id_categoria, $id]);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Editar Producto</h1>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required><br>

        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" value="<?= htmlspecialchars($producto['precio']) ?>" required><br>

        <label for="id_categoria">Categoría:</label>
        <select id="id_categoria" name="id_categoria" required>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?= htmlspecialchars($categoria['id']) ?>" <?= $categoria['id'] == $producto['id_categoria'] ? 'selected' : '' ?>><?= htmlspecialchars($categoria['nombre']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>

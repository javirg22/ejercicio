<?php
include 'bd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $id_categoria = $_POST['id_categoria'];

    // Insertar nuevo producto
    $sql = "INSERT INTO productos (nombre, precio, id_categoria) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $precio, $id_categoria]);

    header('Location: index.php');
    exit();
}

// Obtener todas las categorías
$sql = "SELECT * FROM categorias";
$stmt = $pdo->query($sql);
$categorias = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Nuevo Producto</h1>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" required><br>

        <label for="id_categoria">Categoría:</label>
        <select id="id_categoria" name="id_categoria" required>
            <option value="">Seleccionar Categoría</option>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?= htmlspecialchars($categoria['id']) ?>"><?= htmlspecialchars($categoria['nombre']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Guardar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>

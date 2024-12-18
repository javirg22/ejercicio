<?php
include 'bd.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Obtener el empleado a editar
$id = $_GET['id'];
$sql = "SELECT * FROM empleados WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$empleado = $stmt->fetch();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];

    // Actualizar empleado
    $sql = "UPDATE empleados SET nombre = ?, telefono = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $telefono, $id]);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Empleado</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Editar Empleado</h1>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($empleado['nombre']) ?>" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?= htmlspecialchars($empleado['telefono']) ?>" required><br>

       <br>

        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>


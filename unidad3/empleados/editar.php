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

// Obtener todos los departamentos
$sql = "SELECT * FROM departamentos";
$stmt = $pdo->query($sql);
$departamento = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $id_departamento = $_POST['id_departamento'];

    // Actualizar empleado
    $sql = "UPDATE empleados SET nombre = ?, telefono = ?, id_departamento = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $telefono, $id_departamento, $id]);

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

        <label for="id_departamento">Departamento:</label>
        <select id="id_departamento" name="id_departamento" required>
            <?php foreach ($departamento as $dept): ?>
                <option value="<?= htmlspecialchars($dept['id']) ?>" <?= $dept['id'] == $empleado['id_departamento'] ? 'selected' : '' ?>><?= htmlspecialchars($dept['nombre']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>


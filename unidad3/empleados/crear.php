<?php
include 'bd.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $id_departamento = $_POST['id_departamento'];

    // Insertar nuevo empleado
    $sql = "INSERT INTO empleados (nombre, telefono, id_departamento) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $telefono, $id_departamento]);

    header('Location: index.php');
    exit();
}

// Obtener todas las categorías
$sql = "SELECT * FROM departamentos";
$stmt = $pdo->query($sql);
$departamento = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear empleado</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Nuevo empleado</h1>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="telefono">telefono:</label>
        <input type="text" id="telefono" name="telefono" required><br>

        <label for="id_departamento">Departamento:</label>
        <select id="id_departamento" name="id_departamento" required>
            <option value="">Seleccionar Departamento</option>
            <?php foreach ($departamento as $departamentos): ?>
                <option value="<?= htmlspecialchars($departamentos['id']) ?>"><?= htmlspecialchars($departamentos['nombre']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Guardar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>

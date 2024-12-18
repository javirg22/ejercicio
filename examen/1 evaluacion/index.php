<?php
include 'bd.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Obtener todos los empleados
$sql = "SELECT empleados.id, empleados.nombre AS empleados_nombre, empleados.telefono
        FROM empleados";
$stmt = $pdo->query($sql);
$empleado = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD empleados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lista de empleados</h1>
    <a href="crear.php">Añadir nuevo empleado</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Empleado</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($empleado as $empleado): ?>
            <tr>
                <td><?= htmlspecialchars($empleado['id']) ?></td>
                <td><?= htmlspecialchars($empleado['empleados_nombre']) ?></td>
                <td><?= htmlspecialchars($empleado['telefono']) ?></td>
                <td>
                    <a href="editar.php?id=<?= $empleado['id'] ?>">Editar</a>
                    <a href="eliminar.php?id=<?= $empleado['id'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

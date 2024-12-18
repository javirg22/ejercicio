<?php
include 'bd.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Obtener todos los empleados con sus departamentos
$sql = "SELECT futbolistas.id, futbolistas.nombre AS futbolistas_nombre, futbolistas.dorsal, futbolistas.posicion, equipos.nombre AS equipos_nombre
        FROM futbolistas
        LEFT JOIN equipos ON futbolistas.id_equipos = equipos.id";
$stmt = $pdo->query($sql);
$futbolistas = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD futbolistas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lista de futbolistas</h1>
    <a href="crear.php">Añadir nuevo futbolista</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>futbolista</th>
            <th>dorsal</th>
            <th>posicion</th>
            <th>equipo</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($futbolistas as $futbolista): ?>
            <tr>
                <td><?= htmlspecialchars($futbolista['id']) ?></td>
                <td><?= htmlspecialchars($futbolista['futbolistas_nombre']) ?></td>
                <td><?= htmlspecialchars($futbolista['dorsal']) ?></td>
                <td><?= htmlspecialchars($futbolista['posicion']) ?></td>
                <td><?= htmlspecialchars($futbolista['equipos_nombre'] ?? 'Sin equipo') ?></td>
                <td>
                    <a href="editar.php?id=<?= $futbolista['id'] ?>">Editar</a>
                    <a href="eliminar.php?id=<?= $futbolista['id'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php
include 'bd.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $dorsal = $_POST['dorsal'];
    $id_equipos = $_POST['id_equipos'];
    $posicion = $_POST[ 'posicion'];

    // Insertar nuevo empleado
    $sql = "INSERT INTO futbolistas (nombre, dorsal, id_equipos, posicion) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $dorsal, $id_equipos, $posicion]);

    header('Location: index.php');
    exit();
}

// Obtener todas las categorías
$sql = "SELECT * FROM equipos";
$stmt = $pdo->query($sql);
$equipo = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear futbolista</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Nuevo futbolista</h1>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="dorsal">dorsal:</label>
        <input type="text" id="dorsal" name="dorsal" required><br>
       
        <label for="posicion">posicion:</label>
        <input type="text" id="posicion" name="posicion" required><br>

        <label for="id_equipos">equipos:</label>
        <select id="id_equipos" name="id_equipos" required>
            <option value="">Seleccionar equipos</option>
            <?php foreach ($equipo as $equipos): ?>
                <option value="<?= htmlspecialchars($equipos['id']) ?>"><?= htmlspecialchars($equipos['nombre']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Guardar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>

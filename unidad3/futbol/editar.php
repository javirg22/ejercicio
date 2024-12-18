<?php
include 'bd.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Obtener el futbolista a editar
$id = $_GET['id'];
$sql = "SELECT * FROM futbolistas WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$futbolista = $stmt->fetch();

// Obtener todos los equipos
$sql = "SELECT * FROM equipos";
$stmt = $pdo->query($sql);
$equipos = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $dorsal = $_POST['dorsal'];
    $id_equipos = $_POST['id_equipos'];
    $posicion = $_POST['posicion'];

    // Actualizar futbolista
    $sql = "UPDATE futbolistas SET nombre = ?, dorsal = ?, id_equipos = ?, posicion = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $dorsal, $id_equipos, $posicion, $id]);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Futbolista</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar Futbolista</h1>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($futbolista['nombre']) ?>" required><br>

        <label for="dorsal">Dorsal:</label>
        <input type="number" id="dorsal" name="dorsal" value="<?= htmlspecialchars($futbolista['dorsal']) ?>" required><br>

        <label for="posicion">Posición:</label>
        <input type="text" id="posicion" name="posicion" value="<?= htmlspecialchars($futbolista['posicion']) ?>" required><br>

        <label for="id_equipos">Equipo:</label>
        <select id="id_equipos" name="id_equipos" required>
            <?php foreach ($equipos as $equipo): ?>
                <option value="<?= htmlspecialchars($equipo['id']) ?>" <?= $equipo['id'] == $futbolista['id_equipos'] ? 'selected' : '' ?>><?= htmlspecialchars($equipo['nombre']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>


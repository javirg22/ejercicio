<?php
include 'bd.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];

    // Insertar nuevo empleado
    $sql = "INSERT INTO empleados (nombre, telefono) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $telefono]);

    header('Location: index.php');
    exit();
}

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

       <br>

        <button type="submit">Guardar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>

<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Obtener el nombre de usuario de la sesión
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
</head>
<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>Has iniciado sesión correctamente.</p>
    <a href="cerrar.php">Cerrar sesión</a>
</body>
</html>

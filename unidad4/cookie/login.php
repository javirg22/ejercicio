<?php
// Comprobar si el usuario ya está autenticado a través de la cookie
if (isset($_COOKIE['nombre_usuario'])) {
    echo "Bienvenido de nuevo, " . $_COOKIE['nombre_usuario'] . "! <a href='logout.php'>Cerrar sesión</a>";
    exit;
}

// Procesar el formulario cuando se envía
if ($_POST) {
    $nombre = $_POST['nombre'];
    $recordar = isset($_POST['recordar']); // Verificar si se seleccionó la opción "Recordarme"

    if ($nombre) {
        // Si se seleccionó "Recordarme", guardar la cookie por 30 días
        if ($recordar) {
            setcookie("nombre_usuario", $nombre, time() + (30 * 24 * 60 * 60), "/"); // 30 días
        }
        echo "Hola, " . $nombre . "! Te has autenticado correctamente. <a href='logout.php'>Cerrar sesión</a>";
    } else {
        echo "Por favor, introduce un nombre válido.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="post" action="login.php">
        <label for="nombre">Nombre de usuario:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <input type="checkbox" id="recordar" name="recordar">
        <label for="recordar">Recordarme</label><br><br>

        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>

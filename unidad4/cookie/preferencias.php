<?php
// Verifica si la cookie "colorFondo" está establecida
$colorFondo = isset($_COOKIE['colorFondo']) ? $_COOKIE['colorFondo'] : '#FFFFFF';

// Si se envía el formulario, guarda la preferencia en una cookie
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $colorSeleccionado = $_POST['color'];
    setcookie('colorFondo', $colorSeleccionado, time() + (7 * 24 * 60 * 60)); // Cookie de 1 semana
    $colorFondo = $colorSeleccionado; // Actualiza el color de fondo para la sesión actual
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferencias de Usuario</title>
</head>
<body style="background-color: <?= htmlspecialchars($colorFondo); ?>;">

<h1>Selecciona tu color de fondo preferido</h1>

<form method="POST" action="">
    <label for="color">Color de fondo:</label>
    <br><br>
    <select name="color" id="color">
        <option value="#FFFFFF" <?= $colorFondo == '#FFFFFF' ? 'selected' : ''; ?>>Blanco</option>
        <option value="#FFCCCC" <?= $colorFondo == '#FFCCCC' ? 'selected' : ''; ?>>Rosa claro</option>
        <option value="#CCFFCC" <?= $colorFondo == '#CCFFCC' ? 'selected' : ''; ?>>Verde claro</option>
        <option value="#CCCCFF" <?= $colorFondo == '#CCCCFF' ? 'selected' : ''; ?>>Azul claro</option>
        <option value="#FFFFCC" <?= $colorFondo == '#FFFFCC' ? 'selected' : ''; ?>>amarillo claro</option>
    </select>
    <br><br>
    <button type="submit">Guardar Preferencia</button>
    
</form>

<p><a href="restablecer.php">Restablecer preferencias</a></p>

</body>
</html>

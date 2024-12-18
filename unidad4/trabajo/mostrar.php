<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    unset($_SESSION['idioma']);
    unset($_SESSION['perfil_publico']);
    unset($_SESSION['zona_horaria']);
    $mensaje = "Información de la sesión eliminada";
}

$idioma = $_SESSION['idioma'] ?? 'No establecido';
$perfil_publico = $_SESSION['perfil_publico'] ?? 'No establecido';
$zona_horaria = $_SESSION['zona_horaria'] ?? 'No establecido';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Preferencias</title>
    <link rel="stylesheet" href="DWES04_TAR_R05_tarea.css">
</head>
<body>                  
    <fieldset>
        <legend>Preferencias Almacenadas</legend>

        <?php if (!empty($mensaje)) echo "<span class='mensaje'>$mensaje</span>"; ?>

        <p>Idioma: <?= htmlspecialchars($idioma) ?></p>
        <p>Perfil Público: <?= htmlspecialchars($perfil_publico) ?></p>
        <p>Zona Horaria: <?= htmlspecialchars($zona_horaria) ?></p>

        <form method="post" action="mostrar.php">
            <button type="submit">Borrar preferencias</button>
        </form>

        <a href="preferencias.php">Establecer preferencias</a>
    </fieldset>
</body>
</html>


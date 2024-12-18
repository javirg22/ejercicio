<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['idioma'] = $_POST['idioma'] ?? '';
    $_SESSION['perfil_publico'] = $_POST['perfil_publico'] ?? '';
    $_SESSION['zona_horaria'] = $_POST['zona_horaria'] ?? '';
    $mensaje = "Información guardada en la sesión";
}

$idioma = $_SESSION['idioma'] ?? '';
$perfil_publico = $_SESSION['perfil_publico'] ?? '';
$zona_horaria = $_SESSION['zona_horaria'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Preferencias</title>
    <link rel="stylesheet" href="DWES04_TAR_R05_tarea.css">
</head>
<body>
    <fieldset>
        <legend>Preferencias del Usuario</legend>

        <?php if (!empty($mensaje)) echo "<span class='mensaje'>$mensaje</span>"; ?>

        <form method="post" action="preferencias.php">
            <div class="campo">
                <label class="etiqueta" for="idioma">Idioma:</label>
                <select name="idioma" id="idioma">
                    <option value="inglés" <?= $idioma === 'inglés' ? 'selected' : '' ?>>Inglés</option>
                    <option value="español" <?= $idioma === 'español' ? 'selected' : '' ?>>Español</option>
                </select>
            </div>

            <div class="campo">              
                <label class="etiqueta" for="perfil_publico">Perfil Público:</label>
                <select name="perfil_publico" id="perfil_publico">
                    <option value="sí" <?= $perfil_publico === 'sí' ? 'selected' : '' ?>>Sí</option>
                    <option value="no" <?= $perfil_publico === 'no' ? 'selected' : '' ?>>No</option>
                </select>
            </div>

            <div class="campo">
                <label class="etiqueta" for="zona_horaria">Zona Horaria:</label>
                <select name="zona_horaria" id="zona_horaria">
                    <option value="GMT-2" <?= $zona_horaria === 'GMT-2' ? 'selected' : '' ?>>GMT-2</option>
                    <option value="GMT-1" <?= $zona_horaria === 'GMT-1' ? 'selected' : '' ?>>GMT-1</option>
                    <option value="GMT" <?= $zona_horaria === 'GMT' ? 'selected' : '' ?>>GMT</option>
                    <option value="GMT+1" <?= $zona_horaria === 'GMT+1' ? 'selected' : '' ?>>GMT+1</option>
                    <option value="GMT+2" <?= $zona_horaria === 'GMT+2' ? 'selected' : '' ?>>GMT+2</option>
                </select>
            </div>

            <div class="campo">
                <button type="submit">Establecer preferencias</button>
            </div>
        </form>

        <a href="mostrar.php">Mostrar preferencias</a>
    </fieldset>
</body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
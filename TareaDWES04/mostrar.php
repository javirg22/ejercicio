<?php
session_start(); // Con esto iniciamos la sesión

// Configuración para mostrar los errores en pantalla (útil para depuración)
ini_set('display_errors', 1); // Activar la visualización de errores
ini_set('display_startup_errors', 1); // Mostrar los errores que ocurren durante la carga inicial de PHP
error_reporting(E_ALL); // Mostrar todos los tipos de errores (notices, warnings, errores fatales, etc.)

// Comprobar si se ha enviado la solicitud para borrar las preferencias
if (isset($_POST['borrar_preferencias'])) {
    //Si pulsamos el botón de borrar, borramos las preferencias de la sesión
    unset($_SESSION['idioma']);
    unset($_SESSION['perfil_publico']);
    unset($_SESSION['zona_horaria']);
    
    // Mensaje de confirmación de eliminación de las preferencias
    $mensaje = "<span class='mensaje'>Información de la sesión eliminada</span>";
}

// Recuperar las preferencias de la sesión
$idioma = isset($_SESSION['idioma']) ? $_SESSION['idioma'] : '';
$perfil_publico = isset($_SESSION['perfil_publico']) ? $_SESSION['perfil_publico'] : '';
$zona_horaria = isset($_SESSION['zona_horaria']) ? $_SESSION['zona_horaria'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea DWES04. Sara Díaz Casamayor</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <form method="post">
        <fieldset>
            <legend>Preferencias</legend>

            <?php
            // Si se ha borrado la información, mostrar el mensaje
            if (isset($mensaje)) {
                echo $mensaje; // Mostrar mensaje de confirmación de eliminación
            }

            // Mostrar las preferencias si están definidas en la sesión
                echo "<div class='campo'><label class='etiqueta'>Idioma:</label><br>
                <span class='texto'>$idioma</span></div>";
                echo "<div class='campo'><label class='etiqueta'>Perfil público:</label><br>
                <span class='texto'>$perfil_publico</span></div>";
                echo "<div class='campo'><label class='etiqueta'>Zona horaria:</label><br>
                <span class='texto'>$zona_horaria</span></div>";
        
            ?>
            <br><br>
            <button type="submit" name="borrar_preferencias">Borrar preferencias</button>
            <br>
            <a href="preferencias.php">Establecer preferencias</a>
            
        </fieldset>
    </form>
</body>
</html>

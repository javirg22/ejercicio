<?php
session_start(); // Con esto iniciamos la sesión

// Configuración para mostrar los errores en pantalla (útil para depuración)
ini_set('display_errors', 1); // Activar la visualización de errores
ini_set('display_startup_errors', 1); // Mostrar los errores que ocurren durante la carga inicial de PHP
error_reporting(E_ALL); // Mostrar todos los tipos de errores (notices, warnings, errores fatales, etc.)

//se inicializa la variable vacia para que no de error
$mensaje = "";

// Comprobar si se ha enviado el formulario por metodo POST y almacenar las preferencias en la sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Almacenar las preferencias en la sesión
    $_SESSION['idioma'] = $_POST['idioma']; //Guardar el idioma
    $_SESSION['perfil_publico'] = $_POST['perfil_publico']; //guardar el perfil
    $_SESSION['zona_horaria'] = $_POST['zona_horaria']; //guardar la zona horaria

    $mensaje = "<span class='mensaje'> Informacion de la sesion guardada</span>"; //mostrar mensaje de confirmacion

}
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
    <form action="preferencias.php" method="POST">
        <fieldset> <!-- Agrupar elementos del formulario para mejorar su presentación -->
            <legend>Preferencias</legend> <!--Definimos un título para el grupo de campos del fieldset-->
           
            <?php
                if($mensaje){
                    echo $mensaje;  // Mostrar mensaje de confirmación de la sesión
                }
            ?>

            <div class="campo"> <!--Agrupa cada campo del formulario para aplicar estilos.-->
                <label for="idioma" class="etiqueta">Idioma:</label>
                <select name="idioma" id="idioma" required>
                    <option value="español" <?php if(isset($_SESSION['idioma']) && $_SESSION['idioma'] == 'español') echo 'selected'; ?>>Español</option>
                    <option value="inglés" <?php if(isset($_SESSION['idioma']) && $_SESSION['idioma'] == 'inglés') echo 'selected'; ?>>Inglés</option>
                </select>
           
                <label for="perfil_publico" class="etiqueta">Perfil público:</label>
                <select name="perfil_publico" id="perfil_publico" required>
                    <option value="sí" <?php if(isset($_SESSION['perfil_publico']) && $_SESSION['perfil_publico'] == 'sí') echo 'selected'; ?>>Sí</option>
                    <option value="no" <?php if(isset($_SESSION['perfil_publico']) && $_SESSION['perfil_publico'] == 'no') echo 'selected'; ?>>No</option> 
                </select>
           
                <label for="zona_horaria" class="etiqueta">Zona horaria:</label>
                <select name="zona_horaria" id="zona_horaria" required>
                    <option value="GMT-2" <?php if(isset($_SESSION['zona_horaria']) && $_SESSION['zona_horaria'] == 'GMT-2') echo 'selected'; ?>>GMT-2</option>
                    <option value="GMT-1" <?php if(isset($_SESSION['zona_horaria']) && $_SESSION['zona_horaria'] == 'GMT-1') echo 'selected'; ?>>GMT-1</option>
                    <option value="GMT" <?php if(isset($_SESSION['zona_horaria']) && $_SESSION['zona_horaria'] == 'GMT') echo 'selected'; ?>>GMT</option>
                    <option value="GMT+1" <?php if(isset($_SESSION['zona_horaria']) && $_SESSION['zona_horaria'] == 'GMT+1') echo 'selected'; ?>>GMT+1</option>
                    <option value="GMT+2" <?php if(isset($_SESSION['zona_horaria']) && $_SESSION['zona_horaria'] == 'GMT+2') echo 'selected'; ?>>GMT+2</option>
                </select>
            </div>
            <br>
            <input type="submit" value="Establecer preferencias">
            <br>
            <a href="mostrar.php">Mostrar preferencias</a>
        </fieldset>
    </form>

    
</body>
</html>

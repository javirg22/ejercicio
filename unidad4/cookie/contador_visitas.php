<?php
// Comprobar si la cookie 'visitas' está establecida
if (isset($_COOKIE['visitas'])) {
    // Incrementar el contador de visitas
    $visitas = $_COOKIE['visitas'] + 1;
} else {
    // Si no existe la cookie, inicializarla a 1
    $visitas = 1;
}

// Guardar el nuevo valor de visitas en la cookie
setcookie("visitas", $visitas, time() + (365 * 24 * 60 * 60), "/"); // Duración de 1 año

echo "Has visitado esta página " . $visitas . " veces.";
?>

<br><a href="reset_contador.php">Restablecer contador</a>

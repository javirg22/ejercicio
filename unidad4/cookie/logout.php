<?php
// Eliminar la cookie estableciendo su expiración en el pasado
setcookie("nombre_usuario", "", time() - 3600, "/"); // Expirar la cookie inmediatamente

// Redirigir al usuario de nuevo al formulario de login
header("Location: login.php");
exit;
?>
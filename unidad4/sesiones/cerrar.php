<?php
session_start();
session_unset(); // Limpiar todas las variables de sesión
session_destroy(); // Destruir la sesión

// Redirigir al formulario de inicio de sesión
header("Location: login.php");
exit();
?>

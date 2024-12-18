<?php
// Elimina la cookie estableciendo su tiempo de expiración en el pasado
setcookie('colorFondo', '', time() - 3600);

// Redirige al usuario a la página principal
header('Location: preferencias.php');
exit();
?>

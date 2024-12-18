<?php
// Iniciar una nueva sesión o reanudar la existente
session_start();

// Almacenar datos en la sesión
$_SESSION['usuario'] = 'Juan Pérez';
$_SESSION['email'] = 'juan.perez@example.com';

echo "Sesión iniciada. Bienvenido, " . $_SESSION['usuario'] . "!";
?>
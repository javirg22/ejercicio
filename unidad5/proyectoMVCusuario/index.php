// index.php
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "controllers/UsuarioController.php";

// Crear instancia del controlador
$controller = new UsuarioController();

// Ejecutar el método para mostrar los usuarios
$controller->mostrarUsuarios();
?>
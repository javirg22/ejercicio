<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* navega hasta la raíz de tu proyecto en la terminal.
Ejecuta el comando: php -S localhost:8000
*/
require_once "controllers/LibroController.php";

$action = $_GET['action'] ?? 'listar';
$controller = new LibroController();

switch ($action) {
    case 'crear':
        $controller->crear();
        break;
    case 'guardar':
        $controller->guardar();
        break;
    case 'listar':
        $controller->listar();
        break;
    case 'eliminar':
        $controller->eliminar();
        break;
    default:
        $controller->listar();
}
?>

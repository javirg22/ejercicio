
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* avega hasta la raíz de tu proyecto en la terminal.
Ejecuta el comando: php -S localhost:8000
*/

require_once "controllers/UsuarioController.php";
$action = $_GET['action'] ?? 'login';
$controller = new UsuarioController();

switch ($action) {
    case 'registrar':
        $controller->registrar();
        break;
    case 'login':
        $controller->login();
        break;
    case 'listar':
        $controller->listarUsuarios();
        break;
    default:
        $controller->login();
}
?>

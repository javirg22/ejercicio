<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once './config/database.php';
require_once './controllers/userController.php';
require_once './controllers/taskController.php';

// Acción predeterminada: 'login'
$action = $_GET['action'] ?? 'login';
$controller = null;

// Selección del controlador según la acción
switch ($action) {
    // Acciones relacionadas con usuarios
    case 'login':
    case 'register':
    case 'logout':
        $controller = new UserController();
        break;
    
    // Acciones relacionadas con tareas
        case 'tasks':
        case 'createTask':
        case 'editTask':
        case 'deleteTask':
        $controller = new TaskController();
        break;

    default:
        die("Acción no permitida.");
}

// Llamar al método encargado de manejar la acción
$controller->handleRequest($action);

?>

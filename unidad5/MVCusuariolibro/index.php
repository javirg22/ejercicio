<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once './config/database.php';
require_once './controllers/UserController.php';
require_once './controllers/BookController.php';

$action = $_GET['action'] ?? 'login';
$controller = null;

switch ($action) {
    case 'login':
    case 'register':
    case 'logout':
        $controller = new UserController();
        break;
    case 'books':
    case 'createBook':
    case 'editBook':
    case 'deleteBook':
        $controller = new BookController();
        break;
    default:
        die("Acción no permitida.");
}

$controller->handleRequest($action);
?>

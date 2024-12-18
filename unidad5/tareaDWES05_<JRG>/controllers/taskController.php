<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './models/task.php';

class TaskController {
    private $task;

    public function __construct() {
        global $pdo;
        $this->task = new Task($pdo);
    }

    public function handleRequest($action) {
        switch ($action) {
            case 'tasks':
                $userId = $_SESSION['user_id']; // ID del usuario logueado
                $tasks = $this->task->getAllTasksByUser($userId);
                require './views/task_list.php';
                break;

            case 'createTask':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $userId = $_SESSION['user_id']; // Asociar la tarea al usuario actual
                    $this->task->createTask($title, $description, $userId);
                    header("Location: index.php?action=tasks");
                }

                require './views/task_form.php';
                break;

            case 'editTask':
                $taskId = $_GET['id'];
                $userId = $_SESSION['user_id']; // Usuario logueado

                // Validar que la tarea pertenece al usuario
                $task = $this->task->getTaskByIdAndUser($taskId, $userId);
                if (!$task) {
                    die("No tienes permiso para editar esta tarea.");
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $this->task->updateTask($taskId, $title, $description, $userId);
                    header("Location: index.php?action=tasks");
                }

                require './views/task_form.php'; // Reutilizamos el formulario
                break;

            case 'deleteTask':
                $taskId = $_GET['id'];
                $userId = $_SESSION['user_id']; // Usuario logueado

                // Validar que la tarea pertenece al usuario
                $task = $this->task->getTaskByIdAndUser($taskId, $userId);
                if (!$task) {
                    die("No tienes permiso para eliminar esta tarea.");
                }

                $this->task->deleteTask($taskId);
                header("Location: index.php?action=tasks");
                break;

            default:
                die("Acción no válida.");
        }
    }
}
?>



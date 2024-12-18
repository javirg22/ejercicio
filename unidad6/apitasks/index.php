<?php
require_once 'db.php';
require_once 'task.php';

header("Content-Type: application/json");
$db = (new Database())->connect();
$task = new Task($db);

$request_method = $_SERVER['REQUEST_METHOD'];

switch ($request_method) {
    case 'GET':
        $tasks = $task->getAllTasks()->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($tasks);
        break;
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $title = $data['title'] ?? null;
        $description = $data['description'] ?? null;
        if ($task->createTask($title, $description)) {
            echo json_encode(["message" => "Task created"]);
        }
        break;
    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'] ?? null;
        $is_completed = $data['is_completed'] ?? false;
        if ($task->updateTask($id, $is_completed)) {
            echo json_encode(["message" => "Task updated"]);
        }
        break;
    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        $id = $data['id'] ?? null;
        if ($task->deleteTask($id)) {
            echo json_encode(["message" => "Task deleted"]);
        }
        break;
    default:
        echo json_encode(["message" => "Invalid request"]);
        break;
}

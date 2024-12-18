<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'Database.php';
include_once 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $stmt = $user->read();
    $users_arr = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $user_item = array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "created_at" => $created_at
        );
        array_push($users_arr, $user_item);
    }

    echo json_encode($users_arr);
} elseif ($method == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    if (!empty($data->name) && !empty($data->email)) {
        $user->name = $data->name;
        $user->email = $data->email;

        if ($user->create()) {
            http_response_code(201);
            echo json_encode(array("message" => "Usuario creado."));
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "No se pudo crear el usuario."));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Datos incompletos."));
    }
} elseif ($method == 'DELETE') {
    $data = json_decode(file_get_contents("php://input"));
    if (!empty($data->id)) {
        $user->id = $data->id;

        if ($user->delete()) {
            http_response_code(200);
            echo json_encode(array("message" => "Usuario eliminado."));
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "No se pudo eliminar el usuario."));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Datos incompletos."));
    }
} else {
    http_response_code(405);
    echo json_encode(array("message" => "Método no permitido."));
}

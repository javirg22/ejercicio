<?php
header("Content-Type: application/json");

include_once 'database.php';
include_once 'libro.php';

$database = new Database();
$db = $database->getConnection();

$book = new Book($db);

$requestMethod = $_SERVER["REQUEST_METHOD"];

switch ($requestMethod) {
    case 'GET':
        $stmt = $book->read();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($books);
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"));
        $book->title = $data->title;
        $book->author = $data->author;
        $book->genre = $data->genre;
        $book->published_year = $data->published_year;

        if ($book->create()) {
            echo json_encode(["message" => "Book created successfully."]);
        } else {
            echo json_encode(["message" => "Failed to create book."]);
        }
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"));
        $book->id = $data->id;
        $book->title = $data->title;
        $book->author = $data->author;
        $book->genre = $data->genre;
        $book->published_year = $data->published_year;

        if ($book->update()) {
            echo json_encode(["message" => "Book updated successfully."]);
        } else {
            echo json_encode(["message" => "Failed to update book."]);
        }
        break;

    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"));
        $book->id = $data->id;

        if ($book->delete()) {
            echo json_encode(["message" => "Book deleted successfully."]);
        } else {
            echo json_encode(["message" => "Failed to delete book."]);
        }
        break;

    default:
        echo json_encode(["message" => "Invalid request method."]);
        break;
}
?>

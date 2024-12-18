<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './models/Book.php';

class BookController {
    private $book;

    public function __construct() {
        global $pdo;
        $this->book = new Book($pdo);
    }

    public function handleRequest($action) {
        switch ($action) {
            case 'books':
                $userId = $_SESSION['user_id']; // ID del usuario logueado
                $books = $this->book->getAllBooksByUser($userId);
                require './views/book_list.php';
                break;
    
            case 'createBook':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $title = $_POST['title'];
                    $author = $_POST['author'];
                    $year = $_POST['year'];
                    $userId = $_SESSION['user_id']; // Asociar el libro al usuario actual
                    $this->book->createBook($title, $author, $year, $userId);
                    header("Location: index.php?action=books");
                }
    
               
                require './views/book_form.php';
                break;
    
            case 'editBook':
                $bookId = $_GET['id'];
                $userId = $_SESSION['user_id']; // Usuario logueado
    
                // Validar que el libro pertenece al usuario
                $book = $this->book->getBookByIdAndUser($bookId, $userId);
                if (!$book) {
                    die("No tienes permiso para editar este libro.");
                }
    
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $title = $_POST['title'];
                    $author = $_POST['author'];
                    $year = $_POST['year'];
                    $this->book->updateBook($bookId, $title, $author, $year, $userId);
                    header("Location: index.php?action=books");
                }
    
              
                require './views/book_form.php'; // Reutilizamos el formulario
                break;
    
            case 'deleteBook':
                $bookId = $_GET['id'];
                $userId = $_SESSION['user_id']; // Usuario logueado
    
                // Validar que el libro pertenece al usuario
                $book = $this->book->getBookByIdAndUser($bookId, $userId);
                if (!$book) {
                    die("No tienes permiso para eliminar este libro.");
                }
    
                $this->book->deleteBook($bookId);
                header("Location: index.php?action=books");
                break;
    
            default:
                die("Acción no válida.");
        }
    }
}    
?>

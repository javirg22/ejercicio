<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Book {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllBooksByUser($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM books WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    public function getBookByIdAndUser($bookId, $userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM books WHERE id = ? AND user_id = ?");
        $stmt->execute([$bookId, $userId]);
        return $stmt->fetch(); // Retorna el libro si existe, o false si no lo encuentra
    }
    

    public function createBook($title, $author, $year, $userId) {
        $stmt = $this->pdo->prepare("INSERT INTO books (title, author, year, user_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$title, $author, $year, $userId]);
    }

    public function updateBook($id, $title, $author, $year, $userId) {
        $stmt = $this->pdo->prepare("UPDATE books SET title = ?, author = ?, year = ?, user_id = ? WHERE id = ?");
        return $stmt->execute([$title, $author, $year, $userId, $id]);
    }

    public function deleteBook($id) {
        $stmt = $this->pdo->prepare("DELETE FROM books WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>

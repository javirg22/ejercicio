<?php
class Book {
    private $conn;
    private $table_name = "books";

    public $id;
    public $title;
    public $author;
    public $genre;
    public $published_year;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Listar todos los libros
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Agregar un libro
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (title, author, genre, published_year) VALUES (:title, :author, :genre, :published_year)";
        $stmt = $this->conn->prepare($query);

        // Sanitizar
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->genre = htmlspecialchars(strip_tags($this->genre));
        $this->published_year = htmlspecialchars(strip_tags($this->published_year));

        // Bindear
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":genre", $this->genre);
        $stmt->bindParam(":published_year", $this->published_year);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Actualizar un libro
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET title = :title, author = :author, genre = :genre, published_year = :published_year WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->genre = htmlspecialchars(strip_tags($this->genre));
        $this->published_year = htmlspecialchars(strip_tags($this->published_year));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":genre", $this->genre);
        $stmt->bindParam(":published_year", $this->published_year);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar un libro
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>

<?php
require_once "models/Libro.php";
require_once "models/Autor.php";

class LibroController {
    public function listar() {
        $libros = Libro::obtenerTodos();
        require "views/libroListView.php";
    }

    public function crear() {
        $autores = Autor::obtenerTodos();
        require "views/libroFormView.php";
    }

    public function guardar() {
        $titulo = $_POST['titulo'];
        $autorId = $_POST['autor_id'];
        Libro::crear($titulo, $autorId);
        header("Location: index.php?action=listar");
    }

    public function eliminar() {
        $id = $_GET['id'];
        Libro::eliminar($id);
        header("Location: index.php?action=listar");
    }
}
?>

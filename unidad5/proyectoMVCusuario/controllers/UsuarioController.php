// controllers/UsuarioController.php
<?php
require_once "models/Usuario.php";

class UsuarioController {
    public function mostrarUsuarios() {
        // Obtener datos del modelo
        $usuarios = Usuario::obtenerTodos();
        
        // Incluir la vista, pasándole los datos
        require "views/usuarioView.php";
    }
}
?>
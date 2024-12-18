
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "models/Usuario.php";

class UsuarioController {
    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (Usuario::registrar($nombre, $email, $password)) {
                header("Location: index.php?action=login");
            } else {
                echo "Error al registrar el usuario";
            }
        } else {
            require "views/registroView.php";
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $usuario = Usuario::login($email, $password);

            if ($usuario) {
                session_start();
                $_SESSION['usuario'] = $usuario->getNombre();
                header("Location: index.php?action=listar");
            } else {
                echo "Usuario o contraseña incorrectos";
            }
        } else {
            require "views/loginView.php";
        }
    }

    public function listarUsuarios() {
        $usuarios = Usuario::obtenerTodos();
        require "views/usuarioListView.php";
    }
}
?>

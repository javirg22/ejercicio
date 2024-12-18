<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './models/user.php';

class UserController {
    private $user;

    public function __construct() {
        global $pdo;
        $this->user = new User($pdo);
    }

    public function handleRequest($action) {
        switch ($action) {
            case 'login':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    if ($this->user->login($email, $password)) {
                        // Redirigir a la página de tareas después de un login exitoso
                        header("Location: index.php?action=tasks");
                    } else {
                        $error = "Credenciales incorrectas.";
                    }
                }
                require './views/login.php';  // Vista de login
                break;

            case 'register':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $this->user->register($email, $password);  // Registrar el nuevo usuario
                    header("Location: index.php?action=login");  // Redirigir al login después del registro
                }
                require './views/register.php';  // Vista de registro
                break;

            case 'logout':
                session_destroy();  // Cerrar la sesión
                header("Location: index.php?action=login");  // Redirigir al login después de logout
                break;
        }
    }
}
?>

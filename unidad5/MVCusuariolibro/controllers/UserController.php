<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './models/User.php';

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
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    if ($this->user->login($username, $password)) {
                        header("Location: index.php?action=books");
                    } else {
                        $error = "Credenciales incorrectas.";
                    }
                }
                require './views/login.php';
                break;

            case 'register':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $this->user->register($username, $password);
                    header("Location: index.php?action=login");
                }
                require './views/register.php';
                break;

            case 'logout':
                session_destroy();
                header("Location: index.php?action=login");
                break;
        }
    }
}
?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Registrar un nuevo usuario
    public function register($email, $password) {
        // Se utiliza password_hash para encriptar la contraseña
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        return $stmt->execute([$email, $hash]);
    }

    // Iniciar sesión
    public function login($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        // Verificar la contraseña usando password_verify
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['email'];       // Guardar email de usuario
            $_SESSION['user_id'] = $user['id'];           // Guardar ID de usuario
            return true;
        }
        return false;
    }
    
    // Cerrar sesión
    public function logout() {
        session_unset();
        session_destroy();
    }
}
?>

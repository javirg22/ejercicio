<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($username, $password) {
        $hash = crypt($password, 'salt');
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        return $stmt->execute([$username, $hash]);
    }

    public function login($username, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($user && crypt($password, $user['password']) === $user['password']) {
            $_SESSION['user'] = $user['username'];
            $_SESSION['user_id'] = $user['id']; // Guardamos el ID del usuario logueado
            return true;
        }
        return false;
    }
    
}
?>

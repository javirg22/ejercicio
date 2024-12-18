<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "config.php";

class Usuario {
    private $id;
    private $nombre;
    private $email;
    private $password;

    public function __construct($id, $nombre, $email, $password) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
    }

    public static function registrar($nombre, $email, $password) {
        $conexion = obtenerConexion();
        $query = "INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";
        $stmt = $conexion->prepare($query);
        
        $passwordEncriptada = password_hash($password, PASSWORD_BCRYPT);
        
        return $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':password' => $passwordEncriptada
        ]);
    }

    public static function login($email, $password) {
        $conexion = obtenerConexion();
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $conexion->prepare($query);
        $stmt->execute([':email' => $email]);
        
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            return new Usuario($usuario['id'], $usuario['nombre'], $usuario['email'], $usuario['password']);
        }
        
        return null;
    }

    public static function obtenerTodos() {
        $conexion = obtenerConexion();
        $query = "SELECT * FROM usuarios";
        $stmt = $conexion->prepare($query);
        $stmt->execute();

        $usuarios = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = new Usuario($fila['id'], $fila['nombre'], $fila['email'], $fila['password']);
        }

        return $usuarios;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }
}
?>

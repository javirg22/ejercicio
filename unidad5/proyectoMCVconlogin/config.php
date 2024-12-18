<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// config.php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'mvc_login');
define('DB_USER', 'root'); // Cambiar por el usuario de tu base de datos
define('DB_PASS', 'Tokio2324');     // Cambiar por la contraseña de tu base de datos

function obtenerConexion() {
    try {
        $conexion = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
        exit;
    }
}
?>

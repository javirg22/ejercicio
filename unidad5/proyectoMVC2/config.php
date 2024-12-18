<?php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'biblioteca');
define('DB_USER', 'root');
define('DB_PASS', 'Tokio2324');

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

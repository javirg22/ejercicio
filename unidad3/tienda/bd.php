<?php
// Conexión a la base de datos
$host = '127.0.0.1';
$dbname = 'tienda';
$user = 'root';   // Cambiar si tu usuario es diferente
$pass = 'Tokio2324';       // Cambiar si tienes contraseña

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>

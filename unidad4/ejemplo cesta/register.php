<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start(); // Iniciamos sesión por si es necesario luego
// Configuración de la conexión a la base de datos
$servername = "127.0.01";  // Cambia a la dirección de tu servidor
$username = "root";    // Cambia a tu nombre de usuario de la base de datos
$password = "Tokio2324"; // Cambia a tu contraseña de la base de datos
$dbname = "dwes";  // Cambia a tu nombre de base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Validación básica
    if (!empty($usuario) && !empty($password)) {
        // Hash de la contraseña
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Preparar y ejecutar la consulta de inserción
        $stmt = $conn->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $usuario, $password_hash);

        if ($stmt->execute()) {
            echo "Usuario registrado con éxito.";
            header("Location: login.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Por favor, completa todos los campos.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form action="register.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>

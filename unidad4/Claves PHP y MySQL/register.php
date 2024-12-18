<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Conexión a la base de datos
$conn = new mysqli("127.0.0.1", "root", "Tokio2324", "prueba");


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Procesar formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['username'];
    $password = $_POST['password'];

    // Verificar si el usuario ya existe
    $stmt = $conn->prepare("SELECT nombre FROM usuarios WHERE nombre = ?");
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "El nombre de usuario ya está en uso.";
    } else {
        // Generar un hash de la contraseña
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Insertar el usuario en la base de datos
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, password_hash) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombre, $password_hash);

        if ($stmt->execute()) {
            echo "Registro exitoso.";
        } else {
            echo "Error al registrar el usuario.";
        }
    }
    $stmt->close();
}
$conn->close();
?>

<!-- Formulario de registro -->
<form method="post" action="">
    Nombre de usuario: <input type="text" name="username" required><br>
    Contraseña: <input type="password" name="password" required><br>
    <input type="submit" value="Registrar">
</form>
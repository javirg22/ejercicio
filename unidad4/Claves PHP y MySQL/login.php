<?php
// Conexión a la base de datos
$conn = new mysqli("127.0.0.1", "root", "Tokio2324", "prueba");


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Procesar formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['username'];
    $password = $_POST['password'];

    // Verificar si el usuario existe
    $stmt = $conn->prepare("SELECT password_hash FROM usuarios WHERE nombre = ?");
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($password_hash);
        $stmt->fetch();

        // Verificar la contraseña ingresada contra el hash almacenado
        if (password_verify($password, $password_hash)) {
            echo "Inicio de sesión exitoso.";
            // Aquí puedes iniciar la sesión o redirigir al usuario
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
    $stmt->close();
}
$conn->close();
?>

<!-- Formulario de inicio de sesión -->
<form method="post" action="">
    Nombre de usuario: <input type="text" name="username" required><br>
    Contraseña: <input type="password" name="password" required><br>
    <input type="submit" value="Iniciar Sesión">
</form>
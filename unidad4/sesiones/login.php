<?php
session_start();

// Si el usuario ya inició sesión, redirigirlo a la página de bienvenida
if (isset($_SESSION['username'])) {
    header("Location: bienvenida.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre de usuario del formulario
    $username = $_POST['username'];

    // Validar que no esté vacío
    if (!empty($username)) {
        // Iniciar la sesión y almacenar el nombre de usuario
        $_SESSION['username'] = $username;
        header("Location: bienvenida.php");
        exit();
    } else {
        $error = "Por favor, ingresa un nombre de usuario válido.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label for="username">Nombre de usuario:</label>
        <input type="text" name="username" required>
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>

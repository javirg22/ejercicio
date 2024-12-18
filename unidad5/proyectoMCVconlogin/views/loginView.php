<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="post" action="index.php?action=login">
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Contraseña:</label>
        <input type="password" name="password" required>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>

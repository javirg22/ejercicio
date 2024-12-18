<?php
// Iniciamos la sesión
session_start();

// Si el usuario aún no se ha autentificado, pedimos las credenciales
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Contenido restringido"');
    header("HTTP/1.0 401 Unauthorized");
    exit;
}

// Verificamos si ya hay un usuario guardado en la sesión
if (!isset($_SESSION['usuario'])) {
    // Conectamos a la base de datos
    $dwes = new mysqli("127.0.0.1", "dwes", "abc123.", "dwes");

    // Verificamos si la conexión falló
    if ($dwes->connect_errno) {
        echo "Error de conexión a la base de datos: " . $dwes->connect_error;
        exit;
    }

    // Preparamos la consulta usando sentencias preparadas para evitar inyecciones SQL
    $stmt = $dwes->prepare("SELECT usuario FROM usuarios WHERE usuario=? AND contrasena=md5(?)");
    $stmt->bind_param('ss', $_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Si no existe el usuario, se piden de nuevo las credenciales
    if ($resultado->num_rows == 0) {
        header('WWW-Authenticate: Basic realm="Contenido restringido"');
        header("HTTP/1.0 401 Unauthorized");
        exit;
    } else {
        // Si el usuario es válido, lo guardamos en la sesión
        $_SESSION['usuario'] = $_SERVER['PHP_AUTH_USER'];
    }

    // Cerramos las conexiones
    $stmt->close();
    $dwes->close();
}

// Si ya está autentificado
if (isset($_SESSION['usuario'])) {
    // Comprobamos si se ha enviado el formulario para limpiar el registro
    if (isset($_POST['limpiar'])) {
        unset($_SESSION['visita']);
    } else {
        // Si no existe 'visita', lo inicializamos
        if (!isset($_SESSION['visita'])) {
            $_SESSION['visita'] = [];
        }
        // Registramos la hora de la visita
        $_SESSION['visita'][] = time();
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ejemplo Tema 4: Cookies en autentificación HTTP</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
if (!isset($dwes->connect_errno)) {
    echo "Nombre de usuario: " . htmlspecialchars($_SERVER['PHP_AUTH_USER']) . "<br />";
    echo "Hash de la contraseña: " . md5($_SERVER['PHP_AUTH_PW']) . "<br />";

    if (empty($_SESSION['visita'])) {
        echo "Bienvenido. Esta es su primera visita.";
    } else {
        date_default_timezone_set('Europe/Madrid');
        foreach ($_SESSION['visita'] as $v) {
            echo date("d/m/y \a \l\a\s H:i", $v) . "<br />";
        }
    }
?>
    <form id='vaciar' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>' method='post'>
        <input type='submit' name='limpiar' value='Limpiar registro'/>
    </form>
<?php
} else {
    echo "Se ha producido un error en la conexión a la base de datos.<br />";
}
?>
</body>
</html>

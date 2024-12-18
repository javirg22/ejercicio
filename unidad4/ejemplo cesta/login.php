<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start(); // Iniciamos sesión por si es necesario luego
    
    // Comprobamos si ya se ha enviado el formulario
    if (isset($_POST['enviar'])) {
        $usuario = trim($_POST['usuario']);
        $password = trim($_POST['password']);
       
        // Validamos si los campos están vacíos
        if (empty($usuario) || empty($password)) {
            $error = "Debes introducir un nombre de usuario y una contraseña";
        } else {
            // Comprobamos las credenciales con la base de datos
            try {
                // Opciones de conexión
                $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                $dsn = "mysql:host=127.0.0.1;dbname=dwes";
                $dwes = new PDO($dsn, "dwes", "abc123.", $opc);
                
                // Configuramos PDO para lanzar excepciones en caso de error
                $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Consulta segura con sentencias preparadas
                $sql = "SELECT password FROM usuarios WHERE usuario = :usuario";
                $stmt = $dwes->prepare($sql);
                
                // Ejecutamos la consulta con los valores seguros
                $stmt->execute([':usuario' => $usuario]);
                
                // Obtenemos el resultado
                $fila = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($fila) {
                    if(password_verify($password,$fila[`password`])){
                        //si el usuario es valido regneramos la sesison
                        session_regenerate_id(true);
                    $_SESSION['usuario'] = $usuario;
                    header("Location: productos.php");
                    exit(); // Detenemos el script para evitar continuar cargando la página
                    }else{
                        echo "contraseña incorrecta";
                    }
                } else {
                    // Si las credenciales no son válidas
                    $error = "Usuario o contraseña no válidos!";
                }
            } catch (PDOException $e) {
                $error = "Error en la conexión a la base de datos: " . $e->getMessage();
            }
        }
    }
?>
<!DOCTYPE html >
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejemplo Tema 4: Login Tienda Web</title>
  <link href="login.css" rel="stylesheet" type="text/css">
</head>

<body>
    <h1> Bienvenido a la tienda de ISABEL </h1> 
    <div id='login'>
    <form action='login.php' method='post'>
    <fieldset >
        <legend>Login</legend>
        <!-- Escapamos la variable $error para prevenir XSS -->
        <div><span class='error'><?php echo isset($error) ? htmlspecialchars($error, ENT_QUOTES, 'UTF-8') : ''; ?></span></div>
        
        <div class='campo'>
            <label for='usuario' >Usuario:</label><br/>
            <!-- Usamos htmlspecialchars para escapar la entrada del usuario -->
            <input type='text' name='usuario' id='usuario' maxlength="50" value="<?php echo isset($usuario) ? htmlspecialchars($usuario, ENT_QUOTES, 'UTF-8') : ''; ?>" /><br/>
        </div>
        <div class='campo'>
            <label for='password' >Contraseña:</label><br/>
            <input type='password' name='password' id='password' maxlength="50" /><br/>
        </div>

        <div class='campo'>
            <input type='submit' name='enviar' value='Enviar' />
        </div>
    </fieldset>
    </form>
    </div>
</body>
</html>

<?php
// Inicializamos el mensaje a mostrar
$mensaje = "";

// Comprobamos si el formulario se ha enviado con el método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Establecemos la conexión con la base de datos
        $dwes = new PDO("mysql:host=127.0.0.1;dbname=dwes", "root", "Tokio2324");
        $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Comprobamos si se ha pulsado el botón "Actualizar"
        if (isset($_POST['actualizar'])) {
            // Recuperamos los valores enviados por el formulario
            $cod = $_POST['cod'];
            $nombre_corto = $_POST['nombre_corto'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $pvp = $_POST['pvp'];

            // Creamos la consulta SQL para actualizar el producto
            $sql = "UPDATE producto SET nombre_corto = :nombre_corto, nombre = :nombre, descripcion = :descripcion, pvp = :pvp WHERE cod = :cod";
            $consulta = $dwes->prepare($sql);
            $consulta->bindParam(':nombre_corto', $nombre_corto);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':descripcion', $descripcion);
            $consulta->bindParam(':pvp', $pvp);
            $consulta->bindParam(':cod', $cod);

            // Ejecutamos la consulta y mostramos un mensaje
            if ($consulta->execute()) {
                $mensaje = "Se han actualizado los datos.";
            } else {
                $mensaje = "Error al actualizar el producto.";
            }
        } elseif (isset($_POST['cancelar'])) {
            // Si se ha pulsado el botón "Cancelar", mostramos un mensaje de cancelación
            $mensaje = "Se han cancelado los datos.";
        }
    } catch (PDOException $e) {
        $mensaje = "Error en la conexión: " . htmlspecialchars($e->getMessage());
    } finally {
        // Cerramos la conexión con la base de datos
        unset($dwes);
    }
} else {
    $mensaje = "No se han recibido datos del formulario.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultado de la actualización</title>
</head>
<body>
    <div class="mensaje-container">
        <p><?php echo htmlspecialchars($mensaje); ?></p>
        <button onclick="window.location.href='listado.php';">Continuar</button>
    </div>
</body>
</html>


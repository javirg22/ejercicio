<?php
//Enviar un Código de Estado 404
//Explicación: HTTP/1.1 404 Not Found envía un código de error 404 al navegador.
// Este código le indica al navegador y a los motores de búsqueda que la página no está disponible.
header("HTTP/1.1 404 Not Found");
echo "<h1>404 - Página no encontrada</h1>";
echo "<p>Lo sentimos, la página que buscas no existe.</p>";
?>
<html>
<a href="index.php">Pagina de inicio</a>
</html>

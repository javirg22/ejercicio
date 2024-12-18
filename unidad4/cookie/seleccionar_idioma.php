<?php
// Procesar el formulario
if ($_POST) {
    $idioma = $_POST['idioma'];

    // Guardar la preferencia de idioma en una cookie que durará 1 año
    setcookie("idioma_preferido", $idioma, time() + (365 * 24 * 60 * 60), "/"); // 1 año de duración

    echo "Idioma seleccionado: " . $idioma . ". La preferencia se ha guardado.";
    echo "<br><a href='mostrar_idioma.php'>Ver preferencias guardadas</a>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seleccionar Idioma</title>
</head>
<body>
    <h2>Selecciona tu idioma preferido:</h2>
    <form method="post">
        <label for="idioma">Idioma:</label><br>
        <select id="idioma" name="idioma">
            <option value="es">Español</option>
            <option value="en">Inglés</option>
            <option value="fr">Francés</option>
            <option value="de">Alemán</option>
        </select><br><br>
        <button type="submit">Guardar Preferencia</button>
    </form>
</body>
</html>

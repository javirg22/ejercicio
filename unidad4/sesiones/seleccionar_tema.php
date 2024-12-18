<?php
session_start();

if ($_POST) {
    $tema = $_POST['tema'];
    $_SESSION['tema'] = $tema;

    echo "Tema seleccionado: " . ($tema == 'oscuro' ? 'Oscuro' : 'Claro') . ".";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seleccionar Tema</title>
</head>
<body>
    <h2>Selecciona tu tema preferido:</h2>
    <form method="post" action="seleccionar_tema.php">
        <input type="radio" id="claro" name="tema" value="claro" checked>
        <label for="claro">Claro</label><br>

        <input type="radio" id="oscuro" name="tema" value="oscuro">
        <label for="oscuro">Oscuro</label><br><br>

        <button type="submit">Guardar Tema</button>
    </form>

    <br><a href="ver_tema.php">Ver tema actual</a>
</body>
</html>


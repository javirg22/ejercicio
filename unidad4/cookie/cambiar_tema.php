<?php
if ($_POST) {
    $tema = $_POST['tema'];

    // Guardar la preferencia del tema en una cookie por 1 año
    setcookie("tema_preferido", $tema, time() + (365 * 24 * 60 * 60), "/");

    echo "Has seleccionado el tema " . ($tema == 'oscuro' ? 'oscuro' : 'claro') . ".";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seleccionar Tema</title>
</head>
<body>
    <h2>Selecciona tu tema preferido:</h2>
    <form method="post">
        <input type="radio" id="claro" name="tema" value="claro" checked>
        <label for="claro">Claro</label><br>

        <input type="radio" id="oscuro" name="tema" value="oscuro">
        <label for="oscuro">Oscuro</label><br><br>

        <button type="submit">Guardar Tema</button>
    </form>

    <br><a href="ver_tema.php">Ver tema actual</a>
</body>
</html>

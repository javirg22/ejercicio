<!DOCTYPE html>
<html lang="es">
<head>
    <title>Crear Libro</title>
</head>
<body>
    <h2>Crear Libro</h2>
    <form method="post" action="index.php?action=guardar">
        <label>Título:</label>
        <input type="text" name="titulo" required>
        <label>Autor:</label>
        <select name="autor_id">
            <?php foreach ($autores as $autor): ?>
                <option value="<?= $autor->getId(); ?>"><?= $autor->getNombre(); ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>

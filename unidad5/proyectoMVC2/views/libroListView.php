<!DOCTYPE html>
<html lang="es">
<head>
    <title>Listado de Libros</title>
</head>
<body>
    <h2>Libros</h2>
    <a href="index.php?action=crear">Añadir Libro</a>
    <table border="1">
        <tr><th>ID</th><th>Título</th><th>Autor</th><th>Acciones</th></tr>
        <?php foreach ($libros as $libro): ?>
            <tr>
                <td><?= $libro->getId(); ?></td>
                <td><?= $libro->getTitulo(); ?></td>
                <td><?= $libro->getAutorNombre(); ?></td>
                <td><a href="index.php?action=eliminar&id=<?= $libro->getId(); ?>">Eliminar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

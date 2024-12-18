<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
<h1>Mis Libros</h1>
<a href="index.php?action=createBook">Registrar un nuevo libro</a>
<ul>
    <?php foreach ($books as $book): ?>
        <li>
            <?= $book['title'] ?> - <?= $book['author'] ?> (<?= $book['year'] ?>)
            <a href="index.php?action=editBook&id=<?= $book['id'] ?>">Editar</a>
            <a href="index.php?action=deleteBook&id=<?= $book['id'] ?>">Eliminar</a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>

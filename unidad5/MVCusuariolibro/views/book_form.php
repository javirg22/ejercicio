<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <h1><?= isset($book) ? "Editar Libro" : "Registrar Nuevo Libro" ?></h1>
    <form method="POST" action="index.php?action=<?= isset($book) ? 'editBook&id=' . $book['id'] : 'createBook' ?>">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" value="<?= $book['title'] ?? '' ?>" required>
        
        <label for="author">Autor:</label>
        <input type="text" id="author" name="author" value="<?= $book['author'] ?? '' ?>" required>
        
        <label for="year">Año:</label>
        <input type="number" id="year" name="year" value="<?= $book['year'] ?? '' ?>" required>
        
        <button type="submit"><?= isset($book) ? "Actualizar" : "Registrar" ?></button>
    </form>
    <a href="index.php?action=books">Volver a la lista</a>
</body>
</html>

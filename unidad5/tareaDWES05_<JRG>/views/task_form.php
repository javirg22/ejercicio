<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <h1><?= isset($task) ? "Editar Tarea" : "Registrar Nueva Tarea" ?></h1>
    <form method="POST" action="index.php?action=<?= isset($task) ? 'editTask&id=' . $task['id'] : 'createTask' ?>">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" value="<?= $task['title'] ?? '' ?>" required>
        
        <label for="description">Descripción:</label>
        <textarea id="description" name="description" required><?= $task['description'] ?? '' ?></textarea>
        
        <button type="submit"><?= isset($task) ? "Actualizar" : "Registrar" ?></button>
    </form>
    <a href="index.php?action=tasks">Volver a la lista</a>
</body>
</html>

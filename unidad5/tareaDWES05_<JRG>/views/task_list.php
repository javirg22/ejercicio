<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
<h1>Mis Tareas</h1>
<a href="index.php?action=createTask">Registrar una nueva tarea</a>
<a class="logout-button" href="index.php?action=logout">Cerrar Sesión</a>
<ul>
    <?php foreach ($tasks as $task): ?>
        <li>
            <strong><?= $task['title'] ?></strong> - <?= $task['description'] ?>
            <a href="index.php?action=editTask&id=<?= $task['id'] ?>">Editar</a>
            <a href="index.php?action=deleteTask&id=<?= $task['id'] ?>">Eliminar</a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>


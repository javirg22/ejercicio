<?php
session_start();
$tema = isset($_SESSION['tema']) ? $_SESSION['tema'] : 'claro';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tema Actual</title>
    <?php if ($tema == 'oscuro'): ?>
    <style>
        body {
            background-color: #333;
            color: #fff;
        }
    </style>
    <?php else: ?>
    <style>
        body {
            background-color: #fff;
            color: #000;
        }
    </style>
    <?php endif; ?>
</head>
<body>
    <h1>Tema: <?php echo $tema == 'oscuro' ? 'Oscuro' : 'Claro'; ?></h1>
    <a href="seleccionar_tema.php">Cambiar Tema</a>
</body>
</html>

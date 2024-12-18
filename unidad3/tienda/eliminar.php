<?php
include 'bd.php';

// Obtener el ID del producto a eliminar
$id = $_GET['id'];

// Eliminar producto
$sql = "DELETE FROM productos WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header('Location: index.php');
exit();
?>

<?php
include 'bd.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Obtener el ID del producto a eliminar
$id = $_GET['id'];

// Eliminar producto
$sql = "DELETE FROM empleados WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header('Location: index.php');
exit();
?>

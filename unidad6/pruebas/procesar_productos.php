<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Recibir JSON desde el cuerpo de la solicitud

 //Propósito: Recibe el cuerpo de una solicitud HTTP, generalmente enviado con métodos como POST, PUT, o DELETE.
// Es útil cuando el cliente envía datos en el cuerpo de la solicitud, como un JSON.*/
$json = file_get_contents("php://input"); 

// Verificar si se recibió algo en el cuerpo
if (!$json) {
    echo json_encode([
        "mensaje" => "No se enviaron datos en la solicitud"
    ]);
    http_response_code(400); // Código de respuesta para "Solicitud incorrecta"
    exit;
}

// Decodificar el JSON recibido
$productos = json_decode($json, true);

// Verificar si la decodificación fue exitosa
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode([
        "mensaje" => "Error al decodificar el JSON: " . json_last_error_msg()
    ]);
    http_response_code(400); // Código de respuesta para "Solicitud incorrecta"
    exit;
}

if (!$productos || !is_array($productos)) {
    echo json_encode([
        "mensaje" => "Datos enviados no válidos.",
        "error" => true
    ]);
    exit;
}
// Validar cada producto y comprobar el campo 'precio'
foreach ($productos as $producto) {
    if (!isset($producto["precio"])) {
        echo json_encode([
            "mensaje" => "Falta el campo 'precio' en uno de los productos.",
            "producto" => $producto
        ]);
        http_response_code(400);
        exit;
    }
}

// Calcular el total de los precios
$total = 0;
foreach ($productos as $producto) {
    $total += $producto["precio"];
}

// Responder con un JSON
echo json_encode([
    "mensaje" => "Calculo completado",
    "total" => $total,
    "productos" => $productos
]);
?>
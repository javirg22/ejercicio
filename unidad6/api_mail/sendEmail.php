<?php
//obtenido de github https://github.com/PHPMailer/PHPMailer

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Configurar encabezados para una API RESTful
header('Access-Control-Allow-Origin: *'); // Permite solicitudes desde cualquier origen (ajustar en producción)
header('Access-Control-Allow-Methods: POST');
header('Content-Type: application/json');

// Verifica que el método sea POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Método no permitido
    echo json_encode(['error' => 'Method Not Allowed']);
    exit;
}

// Leer datos JSON enviados por el cliente
$data = json_decode(file_get_contents('php://input'), true);

// Validar datos requeridos
if (!isset($data['to']) || !isset($data['subject']) || !isset($data['message'])) {
    http_response_code(400); // Solicitud incorrecta
    echo json_encode(['error' => 'Missing required fields: to, subject, or message']);
    exit;
}

// Crear instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    //Asegúrate de que:
    //La verificación en dos pasos esté activada.
    //Las contraseñas de aplicación estén habilitadas y genera una para la aplicación Correo
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Cambiar según el servidor SMTP
    $mail->SMTPAuth   = true;
    $mail->Username   = 'javiretuerta2004@gmail.com'; // Tu correo
    $mail->Password   = 'vtpu gbqz htdx bsah'; // Contraseña o clave de aplicación
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Configuración del correo
    $mail->setFrom('javiretuerta2004@gmail.com', 'Javier');
    $mail->addAddress($data['to']); // Destinatario
    $mail->Subject = $data['subject'];
    $mail->Body    = $data['message'];

    // Enviar correo
    $mail->send();

    // Responder al cliente con éxito
    http_response_code(200); // Éxito
    echo json_encode(['message' => 'Email sent successfully']);
} catch (Exception $e) {
    // Responder al cliente con error
    http_response_code(500); // Error interno del servidor
    echo json_encode([
        'error' => 'Failed to send email',
        'details' => $mail->ErrorInfo
    ]);
}
?>

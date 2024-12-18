<?php
if (isset($_COOKIE['idioma_preferido'])) {
    $idioma = $_COOKIE['idioma_preferido'];
    
    echo "Tu idioma preferido es: ";

    // Mostrar un mensaje basado en el idioma
    switch ($idioma) {
        case 'es':
            echo "Español";
            break;
        case 'en':
            echo "Inglés";
            break;
        case 'fr':
            echo "Francés";
            break;
        case 'de':
            echo "Alemán";
            break;
        default:
            echo "Desconocido";
            break;
    }
} else {
    echo "No se ha seleccionado un idioma preferido.";
}
?>

<br><a href="seleccionar_idioma.php">Cambiar idioma</a>

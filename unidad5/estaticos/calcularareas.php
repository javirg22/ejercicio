<?php

class CalculadoraGeometrica {
    // Constante para el valor de PI
    const PI = 3.14159265359;

    // Método estático para calcular el área de un círculo
    public static function calcularAreaCirculo($radio) {
        if ($radio <= 0) {
            return "El radio debe ser mayor que 0.";
        }
        return self::PI * pow($radio, 2);
    }

    // Método estático para calcular el área de un rectángulo
    public static function calcularAreaRectangulo($base, $altura) {
        if ($base <= 0 || $altura <= 0) {
            return "La base y la altura deben ser mayores que 0.";
        }
        return $base * $altura;
    }
}

// Llamada a los métodos estáticos y muestra de resultados
$radio = 5;
$areaCirculo = CalculadoraGeometrica::calcularAreaCirculo($radio);
echo "El área del círculo con radio $radio es: $areaCirculo\n";

$base = 10;
$altura = 4;
$areaRectangulo = CalculadoraGeometrica::calcularAreaRectangulo($base, $altura);
echo "El área del rectángulo con base $base y altura $altura es: $areaRectangulo\n";

?>

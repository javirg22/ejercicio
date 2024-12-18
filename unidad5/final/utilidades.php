<?php

// Definimos la clase Utilidades como final
final class Utilidades {
    
    // Método que convierte el texto a mayúsculas
    public function formatearTexto($texto) {
        return strtoupper($texto);
    }

    // Método que calcula el promedio de un array de números
    public function calcularPromedio($numeros) {
        if (!is_array($numeros) || empty($numeros)) {
            return 0; // Devuelve 0 si el array está vacío o no es válido
        }
        return array_sum($numeros) / count($numeros);
    }
}
// Intento de crear una clase que herede de Utilidades
//class UtilidadesExtendida extends Utilidades {
    // Este código provocará un error porque Utilidades es una clase final
//}
// Probando la clase Utilidades
$utilidades = new Utilidades();
echo $utilidades->formatearTexto("hola mundo"); // Salida: "HOLA MUNDO"
echo $utilidades->calcularPromedio([10, 20, 30]); // Salida: 20


?>

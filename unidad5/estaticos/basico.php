<?php
class Contador {
    public static $contador = 0;

    public static function incrementarContador() {
        self::$contador++;
    }
    public static function obtenerContador(){
      return  self :: $contador;
    }
}

echo Contador::$contador; // Acceder directamente al atributo estático
Contador::incrementarContador(); // Llamar al método estático
Contador::incrementarContador();
echo Contador:: obtenerContador();
?>
<?php
class vehiculo {
    private $marca;
    private $distancia;
    public function __construct($marca,$distancia) {
        $this->marca = $marca;
        $this->distancia = $distancia;
    }
    final public function calcularCosto($precioPorKm){
        
    }
}
?>
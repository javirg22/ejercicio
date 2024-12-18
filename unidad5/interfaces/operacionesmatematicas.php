<?php
interface operaciones{
    public function Suma($a,$b);
    public function Resta($a,$b);
}
class calculadora implements operaciones{
    public function Suma($a,$b){
        return $a + $b;
    }
    public function Resta($a,$b){
        return $a - $b;
    }
}
$calculadora =new calculadora();
echo "Suma de 2 y 3: " .$calculadora->Suma(2,3);

echo " resta de 4 y 3: " .$calculadora->Resta(4,3);
?>
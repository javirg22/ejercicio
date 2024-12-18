<?php

class CuentaBancaria {
    // Propiedades
    private $titular;
    private $saldo;

    // Constructor
    public function __construct($titular, $saldoInicial) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    // Método para depositar dinero
    public function depositar($monto) {
        if ($monto > 0) {
            $this->saldo += $monto;
            echo "Se han depositado $monto. Nuevo saldo: $this->saldo<br>";
        } else {
            echo "El monto a depositar debe ser positivo.<br>";
        }
    }

    // Método para retirar dinero
    public function retirar($monto) {
        if ($monto > 0) {
            if ($this->saldo >= $monto) {
                $this->saldo -= $monto;
                echo "Se han retirado $monto. Nuevo saldo: $this->saldo<br>";
            } else {
                echo "Fondos insuficientes para retirar $monto.<br>";
            }
        } else {
            echo "El monto a retirar debe ser positivo.<br>";
        }
    }

    // Método para mostrar el saldo actual
    public function mostrarSaldo() {
        echo "El saldo actual de la cuenta es: $this->saldo<br>";
    }
}

// Ejemplo de uso
$cuenta = new CuentaBancaria("Juan Pérez", 1000);
$cuenta->mostrarSaldo();
$cuenta->depositar(500);
$cuenta->retirar(300);
?>

<?php

// Interfaz MetodoPago
interface MetodoPago {
    public function pagar($monto);
}

// Clase PagoTarjeta que implementa MetodoPago
class PagoTarjeta implements MetodoPago {
    public function pagar($monto) {
        echo "Pago de $monto realizado con tarjeta de crédito.<br>";
    }
}

// Clase PagoPaypal que implementa MetodoPago
class PagoPaypal implements MetodoPago {
    public function pagar($monto) {
        echo "Pago de $monto realizado con PayPal.<br>";
    }
}

// Clase PagoEfectivo que implementa MetodoPago
class PagoEfectivo implements MetodoPago {
    public function pagar($monto) {
        echo "Pago de $monto realizado en efectivo.<br>";
    }
}

// Clase ProcesadorPago
class ProcesadorPago {
    private $metodoPago;

    public function __construct(MetodoPago $metodoPago) {
        $this->metodoPago = $metodoPago;
    }

    public function procesarPago($monto) {
        $this->metodoPago->pagar($monto);
    }
}

// Ejemplo de uso
$tarjeta = new PagoTarjeta();
$paypal = new PagoPaypal();
$efectivo = new PagoEfectivo();

$procesador = new ProcesadorPago($tarjeta);
$procesador->procesarPago(1000); // Salida: Pago de 1000 procesado con tarjeta de crédito.

$procesador = new ProcesadorPago($paypal);
$procesador->procesarPago(500); // Salida: Pago de 500 procesado con PayPal.

$procesador = new ProcesadorPago($efectivo);
$procesador->procesarPago(300); // Salida: Pago de 300 procesado en efectivo.

?>

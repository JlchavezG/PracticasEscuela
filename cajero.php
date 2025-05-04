<?php
// cajero.php
session_start();

// Inicializamos el saldo si no existe
if (!isset($_SESSION['saldo'])) {
    $_SESSION['saldo'] = 1000; // saldo inicial
}

$operacion = $_POST['operacion'];
$monto = isset($_POST['monto']) ? floatval($_POST['monto']) : 0;
$saldo = &$_SESSION['saldo'];

switch ($operacion) {
    case 'consultar':
        echo "Tu saldo actual es: $" . number_format($saldo, 2);
        break;

    case 'depositar':
        if ($monto > 0) {
            $saldo += $monto;
            echo "Depósito exitoso. Nuevo saldo: $" . number_format($saldo, 2);
        } else {
            echo "Monto inválido para depositar.";
        }
        break;

    case 'retirar':
        if ($monto > 0 && $monto <= $saldo) {
            $saldo -= $monto;
            echo "Retiro exitoso. Nuevo saldo: $" . number_format($saldo, 2);
        } else {
            echo "Fondos insuficientes o monto inválido.";
        }
        break;

    default:
        echo "Operación no válida.";
}
?>
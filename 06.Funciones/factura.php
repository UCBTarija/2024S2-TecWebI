<?php

$items = [
    ['item' => 1000, 'precioU' => 10, 'cantidad' => 2],
    ['item' => 2000, 'precioU' => 15, 'cantidad' => 3],
];

function calcularTotal(array &$data): float
{
    $suma = 0;
    foreach ($data  as &$item) {
        $subtotal = $item['precioU'] * $item['cantidad'];
        $item['subtotal'] = $subtotal;
        $suma += $subtotal;
    }
    return $suma;
}

$total = calcularTotal($items);

include __DIR__.'/factura_vista.php';
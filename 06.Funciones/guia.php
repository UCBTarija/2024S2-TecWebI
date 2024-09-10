<?php

echo "\n.....Duplicar....\n";

/**
 * Duplica un valor
 * @param int $valor Valor a duplicar
 * @return int El doble del valor ingresado
 */
function duplicar(int $valor): int
{
    return $valor * 2;
}

echo duplicar(20);

echo "\n.....Función en variable....\n";

$cuadrado = function (int $a): int {
    return $a * $a;
};

echo $cuadrado(5);

echo "\n...Paso de parámetro por valor...\n";

$arreglo = [
    'nombre' => 'Juan',
    'edad' => 5,
];
print_r($arreglo);

function editarPorValor(array $datos): void
{
    $datos['edad'] = $datos['edad'] + 10;
}
editarPorValor($arreglo);
print_r($arreglo);

echo "\n...Paso de parámetro por referencia...\n";

function editarPorReferencia(array &$datos): void
{
    $datos['edad'] = $datos['edad'] + 10;
}
editarPorReferencia($arreglo);
print_r($arreglo);


?>
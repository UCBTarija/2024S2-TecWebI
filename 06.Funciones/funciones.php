<?php

function suma(int $a, int $b): int{
    return $a + $b;
}

function saludar(): void{
    echo "Hola";
}

echo suma(10, 2);
saludar();

$doble = function(int $a) : int {
    return 2*$a;
};

echo $doble(10);

$b = $doble;

echo $b(30);


$arr = [
    'id'=> 10,
    'nombre' => "juan",
];

function duplicarId(array &$a): void{
    $a['id'] *= 2;
    echo 'dentro de función'; 
    print_r($a);
}

echo '<pre>';
echo '<br> original <br>';
print_r($arr);

duplicarId($arr);

echo '<br> final <br>';
print_r($arr);
<?php

$a = 10;
$b = " todos";

echo "hola $a mundo..."." cómo están".$b;
echo 'hola $a mundo...';

// comentario de una linea
/*
    comentario de varias líneas
*/

$c = $a * 5 + (1 / $a);
echo $c;


if($a == 10){
    echo "El valor es 10";
} else {
    if($a < 10){
        echo "es menor a 10";
    } else {
        echo "es mayor a 10";
    }
}

switch($a){
    case 1: 
        echo "uno";
        break;
    case 10:
        echo 10;
        break;
    default: "ninguno";
}

for($i = 1; $i < 10; $i++){
    echo $i;
}

?>

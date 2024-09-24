<?php

use App\Modelo\Alumno;

require 'Modelo/Persona.php';
require 'Modelo/Alumno.php';

// $a = new Persona(
//     edad: 5,
//     altura: 10
// );

// $a->setNombre("Juan");

// echo $a->getNombre()
//     . ' estatura: '
//     . $a->getAltura()
//     . ' edad: '
//     . $a->getEdad();

$alumno = new Alumno(altura: 20, edad: 10, curso: '3A');
$alumno->setCurso("3A");
$alumno->setNombre("Pedro");
echo  $alumno->getNombre()
    . ' Curso '
    . $alumno->getCurso();

echo \App\Modelo\Persona::numManos();
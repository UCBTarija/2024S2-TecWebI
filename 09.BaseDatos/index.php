<?php

require 'vendor/autoload.php';

// cadena de conexión
$dsn = "pgsql:host=localhost;port=5432;dbname=almacen";

// objeto conexión
$pdo = new PDO($dsn, 'ucb', 'Tarija2024'); 

// prepara una consulta
$query = $pdo->prepare("select id as id_articulo, nombre from articulo where id = :id");

// ejecuta la consulta enviando parámetros
$query->execute([':id' => 1]);

// recupera los datos como un arreglo asociativo
$rows= $query->fetchAll(PDO::FETCH_ASSOC);

// recorre el arreglo imprimiendo las columnas
foreach($rows as $row) {
	print_r("id:". $row['id_articulo']."\n"); 
	print_r("nombre:". $row['nombre']."\n");
}

// prepara una consulta de inserción
$sql = <<<SQL
INSERT into articulo (id, nombre) 
values(:id, :nombre)
SQL;

$query = $pdo->prepare($sql);
$query->execute([':id' => 3, ':nombre' => 'Papa']);

// recupera la cantidad de filas afectadas
echo $query->rowCount();
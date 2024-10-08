<?php
require 'vendor/autoload.php';

use Ucb\Almacen\Services\ArticuloService;
use Ucb\Almacen\Adapters\ArticuloRepositoryImpl;

/**
 * Este script representa el punto de entrada para los servicios. 
 * Podría ser llamado por un formulario html, pasándole los datos post, 
 * o desde un web service que recibe los datos en formato JSON
 * Esta parte será implementada mediante Laravel
 */

// crea el servicio y lo enlaza al repositorio
$service = new ArticuloService(new ArticuloRepositoryImpl());

// inserta un articulo
$service->crearArticulo(['id' => 100, 'nombre' => 'fideos']);

// recupera un artículo
$articulo = $service->getArticulo(100);
print_r($articulo);
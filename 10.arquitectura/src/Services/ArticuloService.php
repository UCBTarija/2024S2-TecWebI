<?php

namespace Ucb\Almacen\Services;

use Ucb\Almacen\Domain\Articulo;
use Ucb\Almacen\Domain\ArticuloRepository;

class ArticuloService
{
    public function __construct(
        private ArticuloRepository $articuloRepository
    ) {}

    /**
     * @param array{id:int,nombre:string} $articuloInfo Datos del artículo que se desea crear
     */
    public function crearArticulo(array $articuloInfo): void
    {
        // logica entre clases
        $articulo = new Articulo(
            $articuloInfo['id'],
            $articuloInfo['nombre'],
        );

        $this->articuloRepository->insert($articulo);
    }
    
    public function getArticulo(int $id): Articulo|null
    {
        return $this->articuloRepository->getArticuloById($id);
    }
}

<?php

namespace Ucb\Almacen\Domain;

interface ArticuloRepository
{
    /**
     * Recupera un artículo
     */
    public function getArticuloById(
        int $id
    ): Articulo|null;

    public function insert(Articulo $articulo): bool;

    public function update(Articulo $articulo): bool;
    
    public function remove(int $articuloId): bool;

    /** @return Articulo[] */
    public function getAll(): array;

}

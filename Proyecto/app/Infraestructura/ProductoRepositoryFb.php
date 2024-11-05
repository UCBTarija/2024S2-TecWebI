<?php

namespace App\Infraestructura;

use App\Core\Dominio\Producto;
use App\Core\Dominio\ProductoRepository;

class ProductoRepositoryFb implements ProductoRepository
{
    /**
     * @inheritdoc
     */
    public function search(string $filtro): array
    {
        $data = FirebaseConnection::get("/productos", [
            'orderBy' => '"codigo"',
            'startAt' => "\"$filtro\"",
            'endAt' => '"\uf8ff"'
        ]);
        if ($data == false) {
            return [];
        }

        $list = [];
        foreach ($data as $id => $row) {
            $list[$id] = new Producto(
                $id,
                $row['codigo'],
                $row['nombre'],
                $row['precio'],
            );
        }

        // siempre devuelve un array, aunque sea vacío
        return $list;
    }

    public function nextIdentity(): int
    {
        return time();
    }

    public function store(Producto $producto): bool
    {
        $data = [
            'codigo' => $producto->getCodigo(),
            'nombre' => $producto->getNombre(),
            'precio' => $producto->getPrecio(),
        ];

        FirebaseConnection::set("/productos/" . $producto->getId(), $data);
        return true;
    }

    public function remove(int $productoId): bool
    {
        return true;
    }

    public function getById(int $id): Producto|false
    {
        $data = FirebaseConnection::get("/productos/$id");
        if ($data == false) {
            return false;
        }

        return new Producto(
            $id,
            $data['codigo'],
            $data['nombre'],
            $data['precio'],
        );
    }
}

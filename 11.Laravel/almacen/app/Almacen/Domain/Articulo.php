<?php

namespace App\Almacen\Domain;

class Articulo
{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;

    public function __construct(int $id, string $nombre, string $descripcion, float $precio, int $stock)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getStock(): int
    {
        return $this->stock;
    }
}
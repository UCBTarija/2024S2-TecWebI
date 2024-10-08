<?php

namespace Ucb\Almacen\Domain;

class Articulo {
    public function __construct(
        private int $id, 
        private string|null $nombre){    
    }

    public function setNombre(string|null $valor): void
    {
        $this->nombre = $valor;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function nombre(): string|null
    {
        return $this->nombre;
    }

}

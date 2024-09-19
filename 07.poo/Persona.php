<?php

abstract class Persona
{
    protected string $nombre;
    private int $altura;
    private int $edad;

    public function __construct(
        int $altura,
        int $edad = 10,
    ) {
        $this->altura = $altura;
        $this->edad = $edad;
    }

    public abstract function getNombre();

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getAltura(): int
    {
        return $this->altura;
    }

    public function getEdad(): int
    {
        return $this->edad;
    }

    public static function numManos(): int {
        return 2;
    }
}

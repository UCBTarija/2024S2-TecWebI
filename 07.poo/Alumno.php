<?php

class Alumno extends Persona
{
    private string $curso;

    public function __construct(
        int $altura,
        int $edad,
        string $curso
    ) {
        parent::__construct($altura, $edad);
        $this->curso = $curso;
    }

    public function getCurso()
    {
        return $this->curso;
    }

    public function setCurso(string $curso): void
    {
        $this->curso = $curso;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }
}

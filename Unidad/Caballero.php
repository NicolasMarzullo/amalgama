<?php

//Concrete strategy Caballero
class Caballero implements TipoUnidad
{
    private int $fuerza;
    private const FUERZA_INICIAL = 20;
    private const COSTO_ENTRENAMIENTO = 30;
    private const AUMENTO_FUERZA_ENTRENAMIENTO = 10;

    function __construct()
    {
        $this->fuerza = self::FUERZA_INICIAL;
    }

    function get_fuerza()
    {
        return $this->fuerza;
    }

    function set_fuerza(int $fuerza)
    {
        $this->fuerza = $fuerza;
    }

    public function transformar()
    {
        throw new Exception("El caballero no puede transformarse");
    }

    public function entrenar()
    {
        //Considero que puede entrenar solo una vez.

        $this->fuerza += self::AUMENTO_FUERZA_ENTRENAMIENTO;
    }

    public function get_costo_entrenamiento()
    {
        return self::COSTO_ENTRENAMIENTO;
    }

    public function get_costo_transformacion()
    {
        return 0;
    }
}

<?php

//Concrete strategy Arquero
class Arquero implements TipoUnidad
{
    private int $fuerza;
    private const FUERZA_INICIAL = 10;
    private const COSTO_ENTRENAMIENTO = 20;
    private const AUMENTO_FUERZA_ENTRENAMIENTO = 7;
    private const COSTO_TRANSFORMACION = 40;

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
        //Cuando se transforma considero que arranca con la fuerza inicial de un Caballero
        return new Caballero();
    }

    public function entrenar()
    {
        $this->fuerza += self::AUMENTO_FUERZA_ENTRENAMIENTO;
    }

    public function get_costo_entrenamiento()
    {
        return self::COSTO_ENTRENAMIENTO;
    }

    public function get_costo_transformacion()
    {
        return self::COSTO_TRANSFORMACION;
    }
}

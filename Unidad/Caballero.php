<?php

class Caballero extends Unidad
{
    private const FUERZA_INICIAL = 20;
    private const COSTO_ENTRENAMIENTO = 30;
    private const AUMENTO_FUERZA_ENTRENAMIENTO = 10;

    function __construct(Ejercito &$ejercito)
    {
        parent::__construct($ejercito, self::FUERZA_INICIAL);
    }

    public function entrenar()
    {
        if (!$this->entrenar_unidad(self::COSTO_ENTRENAMIENTO, self::AUMENTO_FUERZA_ENTRENAMIENTO))
            throw new Exception("No hay oro suficiente para entrenar la unidad :( ", 5);
    }
}

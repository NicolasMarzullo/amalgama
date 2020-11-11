<?php
class Piquero extends Unidad
{

    private const FUERZA_INICIAL = 5;
    private const COSTO_ENTRENAMIENTO = 10;
    private const AUMENTO_FUERZA_ENTRENAMIENTO = 3;
    private const COSTO_TRANSFORMACION = 30;

    function __construct(Ejercito &$ejercito)
    {
        parent::__construct($ejercito, self::FUERZA_INICIAL);
    }

    public function transformar()
    {
        if ($this->validar_transformacion(self::COSTO_TRANSFORMACION))
            return new Arquero($this->ejercito); //Cuando se transforma considero que arranca con la fuerza inicial de un Arquero
        else
            throw new Exception("No hay oro suficiente para transformar al piquero :( ", 1);
    }

    public function entrenar()
    {
        if (!$this->entrenar_unidad(self::COSTO_ENTRENAMIENTO, self::AUMENTO_FUERZA_ENTRENAMIENTO))
            throw new Exception("No hay oro suficiente para entrenar la unidad :( ", 2);
    }
}

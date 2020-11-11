<?php
class Arquero extends Unidad
{

    private const FUERZA_INICIAL = 10;
    private const COSTO_ENTRENAMIENTO = 20;
    private const AUMENTO_FUERZA_ENTRENAMIENTO = 7;
    private const COSTO_TRANSFORMACION = 40;

    function __construct(Ejercito &$ejercito)
    {
        parent::__construct($ejercito, self::FUERZA_INICIAL);
    }

    public function transformar()
    {
        if ($this->validar_transformacion(self::COSTO_TRANSFORMACION))
            return new Caballero($this->ejercito); //Cuando se transforma considero que arranca con la fuerza inicial de un Caballero
        else
            throw new Exception("No se pudo transformar al arquero :( ", 2);
    }

    public function entrenar()
    {
        if (!$this->entrenar_unidad(self::COSTO_ENTRENAMIENTO, self::AUMENTO_FUERZA_ENTRENAMIENTO))
            throw new Exception("No se pudo entrenar al Arquero :( ", 3);
    }
}

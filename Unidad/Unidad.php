<?php

//Class context (Pattern Strategy)
class Unidad
{

    private TipoUnidad $tipo_unidad;
    private Ejercito $ejercito;
    private bool $esta_entrenado;

    public function __construct(TipoUnidad $tipo_unidad, Ejercito &$ejercito)
    {
        $this->tipo_unidad = $tipo_unidad;
        $this->ejercito = $ejercito;
        $this->esta_entrenado = false;
    }

    public function transformar()
    {
        if ($this->ejercito->get_monedas_oro() >= $this->tipo_unidad->get_costo_transformacion()) {
            $this->tipo_unidad = $this->tipo_unidad->transformar();
        }
    }

    public function entrenar()
    {
        if ($this->tipo_unidad->get_costo_entrenamiento() >= $this->ejercito->get_monedas_oro() && !$this->esta_entrenado) {
            $this->ejercito->set_monedas_oro($this->ejercito->get_monedas_oro() - $this->tipo_unidad->get_costo_entrenamiento());
            $this->esta_entrenado = true;
        } else
            return false;

        $this->tipo_unidad->entrenar();
        return true;
    }

    /**
     * 
     * @return TipoUnidad
     */
    public function get_tipo_unidad()
    {
        return $this->tipo_unidad;
    }

    /**
     * Metodo para saber si una unidad ya fue entrenada o no
     */
    public function esta_entrenado()
    {
        return $this->esta_entrenado;
    }
}

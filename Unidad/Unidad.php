<?php
class Unidad
{
    protected Ejercito $ejercito;
    private bool $esta_entrenado;
    private int $fuerza;


    public function __construct(Ejercito &$ejercito, int $fuerza)
    {
        $this->ejercito = $ejercito;
        $this->fuerza = $fuerza;
        $this->esta_entrenado = false;
    }

    /**
     * Entrena a la unidad (aumenta su fuerza) y marca a la unidad como entrenada
     * 
     * 
     * @param int $costo_entrenamiento costo en monedas de oro entrenar la unidad
     * @param int $aumento_fuerza cantidad de fuerza que se le debe aumentar a la unidad
     * @return boolean true si se puedo entrenar false si no se pudo
     */
    protected function entrenar_unidad(int $costo_entrenamiento, int $aumento_fuerza)
    {
        //Valido que haya suficientes monedas de oro para entrenar
        if ($costo_entrenamiento >= $this->ejercito->get_monedas_oro() && !$this->esta_entrenado) { // Considero que se puede entrenar una sola vez.
            $this->ejercito->descontar_monedas_oro($costo_entrenamiento);
            $this->esta_entrenado = true;
            $this->fuerza += $aumento_fuerza;
        } else
            return false;

        return true;
    }

    /**
     * Valida si hay suficientes monedas en el ejército para hacer la transformacion. Si las hay las descuenta.
     * 
     * @param int $costo_transformacion costo de transformar la unidad
     * @return boolean true si se puede transformar, false si no se puede
     */
    protected function validar_transformacion(int $costo_transformacion)
    {
        if ($costo_transformacion >= $this->ejercito->get_monedas_oro()) {
            $this->ejercito->descontar_monedas_oro($costo_transformacion);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Metodo para saber si una unidad ya fue entrenada o no
     */
    public function esta_entrenado()
    {
        return $this->esta_entrenado;
    }

    function get_fuerza()
    {
        return $this->fuerza;
    }

    function set_fuerza(int $fuerza)
    {
        $this->fuerza = $fuerza;
    }
}

<?php
class Ejercito
{
    const MONEDAS_ORO_INICIAL = 1000;
    private int $monedas_oro;
    private $unidades;
    private $batallas;


    public function __construct(Civilizacion $civilizacion)
    {
        $this->monedas_oro = self::MONEDAS_ORO_INICIAL;

        for ($i = 0; $i < $civilizacion->get_cant_piqueros(); $i++) {
            $this->unidades[] = new Unidad(new Piquero(), $this);
        }

        for ($i = 0; $i < $civilizacion->get_cant_arqueros(); $i++) {
            $this->unidades[] = new Unidad(new Arquero(), $this);
        }

        for ($i = 0; $i < $civilizacion->get_cant_piqueros(); $i++) {
            $this->unidades[] = new Unidad(new Caballero(), $this);
        }

        //Inicilizo el array de batallas
        $this->batallas = [];
    }

    public function set_monedas_oro(int $monedas_oro)
    {
        $this->monedas_oro = $monedas_oro;
    }

    public function get_monedas_oro()
    {
        return $this->monedas_oro;
    }

    /**
     * Retorna los puntos de fuerza totales del ejército
     * @return int puntos de fuerza 
     */
    public function get_puntos_fuerza()
    {
        $puntos_fuerza_total = 0;
        foreach ($this->unidades as $unidad) {
            $puntos_fuerza_total += $unidad->get_tipo_unidad()->get_fuerza();
        }
        return $puntos_fuerza_total;
    }

    /**
     * Ordena el array de unidades según la fuerza de mayor a menor (descendente)
     * 
     */
    private function ordenar_unidades()
    {
        usort($this->unidades, function (Unidad $unidad_1, Unidad $unidad_2) {
            //Algoritmo de comparacion para poder ordenar un array de Unidad
            $fuerza_unidad_1 = $unidad_1->get_tipo_unidad()->get_fuerza();
            $fuerza_unidad_2 = $unidad_2->get_tipo_unidad()->get_fuerza();

            if ($fuerza_unidad_1 == $fuerza_unidad_2)
                return 0;

            return ($fuerza_unidad_1 < $fuerza_unidad_2) ? 1 : -1; //Orden descendente
        });
    }

    /**
     * Elimina el top N de unidades que se desee. Método utilizado cuando pierde el ejército una batalla.
     * 
     * @param int cant_top TOP N de unidades que se desea eliminar
     * 
     * @return boolean retorna true si pudo eliminarlos o false si no se pudo
     */
    public function eliminar_top_unidades(int $cant_top)
    {
        if (!empty($this->unidades)) {
            //Ordeno las unidades segun su fuerza
            $this->ordenar_unidades();

            //Borro los N primeros
            for ($i = 0; $i < $cant_top; $i++) {
                unset($this->unidades[$i]);
            }

            return true;
        } else {
            return false;
        }
    }

    /**
     * Elimina una unidad al azar del ejército. Es utilizada para resolver el empate en las batallas
     */
    public function eliminar_unidad_al_azar()
    {
        $numero_random = rand(0, count($this->unidades) - 1);
        unset($this->unidades[$numero_random]);
    }

    /**
     * Le agrega una nueva batalla al array de batallas del ejército
     */
    public function set_batalla(Batalla $batalla)
    {
        $this->batallas[] = $batalla;
    }

    /**
     * Obtener todas las batallas en las que participó un ejercito
     * 
     * @return array Batalla, retorna un array de batallas
     */
    public function get_batallas()
    {
        return $this->batallas;
    }

    /**
     * Agrega monedas de oro al ejército
     * @param int monedas_oro
     */
    public function agregar_monedas_oro(int $monedas_oro)
    {
        $this->monedas_oro += $monedas_oro;
    }
}

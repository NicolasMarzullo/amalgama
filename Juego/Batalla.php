<?php

class Batalla
{

    private const CANTIDAD_UNIDADES_PERDIDAS_POR_BATALLA = 2;
    private const CANTIDAD_MONEDAS_ORO_GANADAS_POR_BATALLA = 100;
    private Ejercito $ejercito_atacante;
    private Ejercito $ejercito_atacado;
    private String $lugar;
    private DateTime $fecha_hora;


    public function __construct(Ejercito $ejercito_atacante, Ejercito $ejercito_atacado, String $lugar, DateTime $fecha_hora)
    {
        $this->ejercito_atacante = $ejercito_atacante;
        $this->ejercito_atacado = $ejercito_atacado;

        $this->lugar = $lugar; // Lugar donde sucedió la batalla.
        $this->fecha_hora = new DateTime(); //Fecha y hora de la batalla

        //Guardo en cada ejército la nueva batalla de la que participaron
        $this->ejercito_atacado->set_batalla($this);
        $this->ejercito_atacante->set_batalla($this);
    }


    /**
     * Resuelve la lógica de una batalla entre dos ejércitos
     */
    public function resolver_batalla()
    {
        $puntos_ejercito_atacante = $this->ejercito_atacante->get_puntos_fuerza();
        $puntos_ejercito_atacado = $this->ejercito_atacado->get_puntos_fuerza();

        if ($puntos_ejercito_atacante > $puntos_ejercito_atacado) {
            //Ejercito atacante ganador
            $this->ejercito_atacante->set_monedas_oro($this->ejercito_atacante->get_monedas_oro() + self::CANTIDAD_MONEDAS_ORO_GANADAS_POR_BATALLA); //Aumento monedas ejercito atacante
            $this->ejercito_atacado->eliminar_top_unidades(self::CANTIDAD_UNIDADES_PERDIDAS_POR_BATALLA);
        } else if ($puntos_ejercito_atacante < $puntos_ejercito_atacado) {
            //Ejercito atacado ganador
            $this->ejercito_atacado->set_monedas_oro($this->ejercito_atacado->get_monedas_oro() + self::CANTIDAD_MONEDAS_ORO_GANADAS_POR_BATALLA); //Aumento monedas ejercito atacado
            $this->ejercito_atacante->eliminar_top_unidades(self::CANTIDAD_UNIDADES_PERDIDAS_POR_BATALLA);
        } else {
            //empate
            $this->ejercito_atacado->eliminar_unidad_al_azar();
            $this->ejercito_atacante->eliminar_unidad_al_azar();
        }
    }
}

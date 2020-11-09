<?php


//Esta clase se crea simplemente con el objetivo de mostrar donde estarían almacenados todos los ejércitos de un jugador
//Y demas se desea mostrar que el dominio cumple con el requisito de que un jugador puede tener varios ejércitos pero de una misma civilizacion
class Jugador
{
    private $ejercitos;

    /* 
     * Un jugador puede tener varios ejercitos pero de una misma civilizacion
     */
    public function __construct(Civilizacion $civilizacion, int $cantidad_ejercitos)
    {
        for ($i = 0; $i < $cantidad_ejercitos; $i++) {
            $this->ejercitos[] = new Ejercito($civilizacion);
        }
    }
}

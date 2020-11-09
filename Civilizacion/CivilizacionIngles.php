<?php

class CivilizacionIngles extends Civilizacion
{
    const CANT_INICIAL_PIQUEROS = 10;
    const CANT_INICIAL_ARQUEROS = 10;
    const CANT_INICIAL_CABALLEROS = 10;

    public function __construct()
    {
        parent::__construct(self::CANT_INICIAL_PIQUEROS, self::CANT_INICIAL_ARQUEROS, self::CANT_INICIAL_CABALLEROS, "Ingleses");
    }
}

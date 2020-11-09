<?php

class CivilizacionBizantinoss extends Civilizacion
{
    const CANT_INICIAL_PIQUEROS = 5;
    const CANT_INICIAL_ARQUEROS = 8;
    const CANT_INICIAL_CABALLEROS = 15;

    public function __construct()
    {
        parent::__construct(self::CANT_INICIAL_PIQUEROS, self::CANT_INICIAL_ARQUEROS, self::CANT_INICIAL_CABALLEROS, "Bizantinos");
    }
}

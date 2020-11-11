<?php
class CivilizacionChinos extends Civilizacion
{
    const CANT_INICIAL_PIQUEROS = 2;
    const CANT_INICIAL_ARQUEROS = 25;
    const CANT_INICIAL_CABALLEROS = 2;

    public function __construct()
    {
        parent::__construct(self::CANT_INICIAL_PIQUEROS, self::CANT_INICIAL_ARQUEROS, self::CANT_INICIAL_CABALLEROS, "Chinos");
    }
}

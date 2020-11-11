<?php
abstract class Civilizacion // Abstracta, no deseo instanciar esta clase, las instanciables son las concretas, ejemplo: CivilizacionIngles
{
    private int $cantidad_piqueros;
    private int $cantidad_arqueros;
    private int $cantidad_caballeros;
    private string $nombre;

    public function __construct(int $cantidad_piqueros, int $cantidad_arqueros, int $cantidad_caballeros, string $nombre)
    {
        $this->cantidad_piqueros = $cantidad_piqueros;
        $this->cantidad_arqueros = $cantidad_arqueros;
        $this->cantidad_caballeros = $cantidad_caballeros;
        $this->nombre = $nombre;
    }

    public function get_cant_piqueros()
    {
        return $this->cantidad_piqueros;
    }

    public function get_cant_arqueros()
    {
        return $this->cantidad_arqueros;
    }

    public function get_cant_caballeros()
    {
        return $this->cantidad_caballeros;
    }

    public function get_nombre()
    {
        return $this->nombre;
    }
}

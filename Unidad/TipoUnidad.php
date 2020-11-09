<?php


//Interface strategy 
interface TipoUnidad
{
    public function transformar();
    public function entrenar();
    public function get_costo_entrenamiento();
    public function get_costo_transformacion();
    public function get_fuerza();
}

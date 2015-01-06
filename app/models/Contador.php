<?php

namespace app\models;

use \mako\database\midgard\ORM;
use \mako\database\query\Raw;

class Contador extends ORM
{
    protected $tableName = 'contador';

    public $numero_fila;
    public $tamanyo;

    public function obtenerHorasDia($dia)
    {
    	return Contador::select( [ new Raw('TIME(fecha) as tiempo')])
						->where(new Raw('DATE(fecha)'), '=', $dia)
						->all();
    }

    public function vecesPorDia()
    {
    	return Contador::select([ new Raw('SUM(veces) as cantidad'), 'fecha'])
						->groupBy(new Raw('DATE(fecha)'))
						->orderBy('fecha','asc')
						->all();
    }
}

<?php

namespace app\models;

use \mako\database\midgard\ORM;

class Contador extends ORM
{
    protected $tableName = 'contador';

    
    public function obtenerHorasDia($dia)
    {

    	return Contador::select( [ new Raw('TIME(fecha) as tiempo')])
						->where(new Raw('DATE(fecha)'), '=', $dia)
						->all();
    }
}

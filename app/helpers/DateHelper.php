<?php
namespace app\helpers;

use \mako\chrono\Time;

class DateHelper
{

	public static function translateDay( $date )
	{	
		$day = date_format(Time::createFromFormat('Y-m-d H:i:s', $date),'D');
		switch ( $day )
		{
			case 'Mon': $day = 'Lunes'; 
						break;
			case 'Tue': $day = 'Martes'; 
						break;
			case 'Wed': $day = 'Miercoles'; 
						break;
			case 'Thu': $day = 'Jueves'; 
						break;
			case 'Fri': $day = 'Viernes'; 
						break;
			case 'Sat': $day = 'Sabado'; 
						break;
			case 'Sun': $day = 'Domingo'; 
						break;
		}	
		return $day;
	}

	public static function getFirstWeekDay()
	{	
		$hoy = Time::now('Europe/Paris');
		$diaSemana = date_format($hoy, 'D');

		switch ( $diaSemana )
		{
			case 'Mon': $dia = $hoy;
						break;
			case 'Tue': $dia = strtotime('-1 day', $hoy);
						break;
			case 'Wed': $dia = strtotime('-2 day', $hoy);
						break;
			case 'Thu': $dia = strtotime('-3 day', $hoy);
						break;
			case 'Fri': $dia = strtotime('-4 day', $hoy);
						break;
			case 'Sat': $dia = strtotime('-5 day', $hoy);
						break;
			case 'Sun': $dia = strtotime('-6 day', $hoy);
						break;
			default: $diaSemana = $hoy;
		}	
		



	}
}
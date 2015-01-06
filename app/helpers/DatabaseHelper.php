<?php
namespace app\helpers;

class DatabaseHelper
{
	public static function add_cont( $result )
	{	
		$i=0;
		foreach ($result as $r)
		{
			$r->numero_fila = $i;
			$r->tamanyo = sizeof($result);

			$arr_result[] = $r;
			$i++;
		}
		return $arr_result;
	}	

	public static function isNotLastRow( $row )
	{
		if ( ($row->numero_fila + 1) <  $row->tamanyo )
			return true;
		else
			return false;
	}
}
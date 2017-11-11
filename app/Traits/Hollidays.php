<?php

namespace App\Traits;

trait Hollidays
{
	public static function checkdate($date)
	{

		$hdays = [
			'31.10' => 'Halloween',
			'24.12' => 'Christmas Day (US)',
			'31.12' => 'New Year',
			'06.12' => 'Christmas Day (UA)',
			'16.01' => 'My Birth Day!',
		];

		if((array_key_exists($date, $hdays))) {
			return $hdays[$date];
		} else {
			return false;
		}
	}
}
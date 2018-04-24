<?php

namespace Rem42\Faker\Provider;

use Faker\Provider\Base;

class Pokemon extends Base
{
	protected static $name = [
		'Bulbizarre'
	];
	protected static $locations = [
		'Arabelle'
	];
	protected static $moves = [
		'Vol-Vie'
	];

	public function pokemonName(){
		return static::randomElement(static::$name);
	}
	public function pokemonLocation(){
		return static::randomElement(static::$locations);
	}
	public function pokemonMove(){
		return static::randomElement(static::$moves);
	}
}
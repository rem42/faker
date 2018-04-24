<?php

namespace Rem42\Faker\Provider;

use Faker\Provider\Base;

class HarryPotter extends Base
{
	protected static $characters = [
		'Hannah Abbott'
	];
	protected static $locations = [
		'The Burrow'
	];
	protected static $quotes = [
		'It does not do to dwell on dreams and forget to live.'
	];
	protected static $books = [
		'Harry Potter and the Sorcerer\'s Stone'
	];
	protected static $houses = [
		'Gryffindor'
	];

	public function harryPotterCharacters(){
		return static::randomElement(static::$characters);
	}
	public function harryPotterLocation(){
		return static::randomElement(static::$locations);
	}
	public function harryPotterQuote(){
		return static::randomElement(static::$quotes);
	}
	public function harryPotterBook(){
		return static::randomElement(static::$books);
	}
	public function harryPotterHouse(){
		return static::randomElement(static::$houses);
	}
}
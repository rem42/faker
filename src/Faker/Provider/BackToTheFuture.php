<?php

namespace Rem42\Faker\Provider;

use Faker\Provider\Base;

class BackToTheFuture extends Base
{
	protected static $name = [
		'Marty McFly'
	];
	protected static $date = [
		'November 5, 1955'
	];
	protected static $quote = [
		'Ah, Jesus Christ! Jesus Christ, Doc, you disintegrated Einstein!'
	];

	public function backToTheFutureName(){
		return static::randomElement(static::$name);
	}
	public function backToTheFutureDate(){
		return static::randomElement(static::$date);
	}
	public function backToTheFutureQuote(){
		return static::randomElement(static::$quote);
	}
}
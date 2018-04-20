<?php

namespace Rem42\Faker;

use Faker\Generator;

class ProviderLoader
{
	const DEFAULT_LOCALE = 'en_US';

	protected static $defaultProviders = ['Pokemon'];

	/**
	 * @param Generator $generator
	 * @param string $locale
	 */
	public static function addAllProvidersTo(Generator $generator, $locale = self::DEFAULT_LOCALE){
		foreach (static::$defaultProviders as $provider) {
			$providerClassName = self::getProviderClassname($provider, $locale);
			$generator->addProvider(new $providerClassName($generator));
		}
	}

	/**
	 * @param string $provider
	 * @param string $locale
	 * @return string
	 */
	protected static function getProviderClassname($provider, $locale = '')
	{
		if ($providerClass = self::findProviderClassname($provider, $locale)) {
			return $providerClass;
		}
		// fallback to default locale
		if ($providerClass = self::findProviderClassname($provider, static::DEFAULT_LOCALE)) {
			return $providerClass;
		}
		// fallback to no locale
		if ($providerClass = self::findProviderClassname($provider)) {
			return $providerClass;
		}
		throw new \InvalidArgumentException(sprintf('Unable to find provider "%s" with locale "%s"', $provider, $locale));
	}

	/**
	 * @param string $provider
	 * @param string $locale
	 * @return string
	 */
	protected static function findProviderClassname($provider, $locale = '')
	{
		$providerClass = 'Rem42\Faker\\' . ($locale ? sprintf('Provider\%s\%s', $locale, $provider) : sprintf('Provider\%s', $provider));
		if (class_exists($providerClass, true)) {
			return $providerClass;
		}
	}
}
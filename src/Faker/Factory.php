<?php

namespace Rem42\Faker;

use Faker\Factory as BaseFactory;

class Factory extends BaseFactory
{
	protected static $defaultProviders = array(
		'Address', 'Barcode', 'Biased', 'Color', 'Company', 'DateTime', 'File', 'HtmlLorem', 'Image', 'Internet', 'Lorem', 'Miscellaneous', 'Payment', 'Person', 'PhoneNumber', 'Text', 'UserAgent', 'Uuid'
	);
	protected static $newProviders = array(
		'Pokemon'
	);
    /**
     * Create a new generator
     *
     * @param string $locale
     * @return Generator
     */
    public static function create($locale = self::DEFAULT_LOCALE)
    {
	    $generator = parent::create($locale);
	    foreach (static::$newProviders as $provider) {
		    $providerClassName = self::getNewProviderClassname($provider, $locale);
		    $generator->addProvider(new $providerClassName($generator));
	    }
	    return $generator;
    }

	/**
	 * @param string $provider
	 * @param string $locale
	 * @return string
	 */
	protected static function getNewProviderClassname($provider, $locale = '')
	{
		if ($providerClass = self::findNewProviderClassname($provider, $locale)) {
			return $providerClass;
		}
		// fallback to default locale
		if ($providerClass = self::findNewProviderClassname($provider, static::DEFAULT_LOCALE)) {
			return $providerClass;
		}
		// fallback to no locale
		if ($providerClass = self::findNewProviderClassname($provider)) {
			return $providerClass;
		}
		throw new \InvalidArgumentException(sprintf('Unable to find provider "%s" with locale "%s"', $provider, $locale));
	}

	/**
	 * @param string $provider
	 * @param string $locale
	 * @return string
	 */
	protected static function findNewProviderClassname($provider, $locale = '')
	{
		$providerClass = 'Rem42\Faker\\' . ($locale ? sprintf('Provider\%s\%s', $locale, $provider) : sprintf('Provider\%s', $provider));
		if (class_exists($providerClass, true)) {
			return $providerClass;
		}
	}
}

<?php
namespace Junker;

class ShortenerList
{
	const FILE_PATH = __DIR__ . '/../../res/shorturl-services-list.txt';

	private static $hlist = NULL;

	private static function load()
	{
		if (!self::$hlist)
		{
			$list = file(self::FILE_PATH, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

			self::$hlist = array_flip($list); 
		}
	}

	private static function getHost(string $url) 
	{ 
	   $parsed_url = parse_url(trim($url));
	   $path = $parsed_url['path'];

	   return $parsed_url['host'] ?? explode('/', $path)[0]; 
	}

	public static function getAll(): array
	{
		self::load();

		return array_keys(self::$hlist);
	}


	public static function has(string $domain): bool
	{
		self::load();

		return isset(self::$hlist[mb_strtolower($domain)]);
	}

	public static function checkUrl(string $url): bool
	{
		$host = str_ireplace('www.', '', self::getHost($url));

		return self::has($host);
	}

	public static function add(string $domain)
	{
		self::load();

		self::$hlist[mb_strtolower($domain)] = TRUE;
	}
}
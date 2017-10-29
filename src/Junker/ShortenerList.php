<?php
namespace Junker;

class ShortenerList
{
	const FILE_PATH = __DIR__ . '/../../res/shorturl-services-list.txt';

	public static function getAll()
	{
		$file = file(FILE_PATH, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		
		return $file; 
	}
}
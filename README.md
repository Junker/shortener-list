# ShortenerList

PHP Library for detect shorteners domains 

## Requirements
- PHP >= 7.0

## Installation
The best way to install JSendResponse is to use a [Composer](https://getcomposer.org/download):

    php composer.phar require junker/shortener-list


## Examples

```php
use Junker\ShortenerList;


$url = 'https://bit.ly/Ha12Kx';
$url2 = 'bit.ly/Ha12Kx';
$url_is_shortener = ShortenerList::checkUrl($url);
$url2_is_shortener = ShortenerList::checkUrl($url2);

$domain = parse_url($url, PHP_URL_HOST);
$domain_is_shortener = ShortenerList::has($domain);

$all_shorteners = ShortenerList::getAll();

ShortenerList::add($my_shortener_domain);

```

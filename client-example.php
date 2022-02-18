<?php
declare(strict_types=1);

require_once ('vendor/autoload.php');

use Ilkin\Snubes\RedisCacheManager;
use Ilkin\Snubes\MemcacheCacheManager;

public const APP_ROOT = __DIR__;

function dump($data)
{
    var_dump($data);
}

$cm = new RedisCacheManager();
$cm->set('number-five','5');
$cm->lpush('number-seven','6');
$cm->lpush('number-seven','7');
dump($cm->get('number-five'));
dump($cm->get('number-seven'));

$cm = new MemcacheCacheManager();
$cm->set('number-two','2');
dump($cm->get('number-two'));

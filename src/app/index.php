<?php
require __DIR__ . '/../vendor/autoload.php';

use App\caches\CacheManager;

$cm = new CacheManager;
$cm->setCache('redis');
$cm->connect('somehost', 6379);
$cm->set('one', '1');
$cm->lpush('two', '1');
$cm->lpush('two', '2');
echo $cm->get('one');

$cm->setCache('memcache');
$cm->connect('somehost', '11211');
$cm->set('one', '1');
$cm->lpush('two', '2'); // generates exception
echo $cm->get('one');

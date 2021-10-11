<?php

use Snubes\CacheManager;
use Snubes\Config;

$redisConfig = new Config('Redis', 'host', 11);
$cm = CacheManager::connect($redisConfig);

$cm->set('one', '1');
$cm->lpush('two', '1');
$cm->lpush('two', '2');
echo $cm->get('one');

$memcacheConfig = new Config('Memcache', 'host', 11);
$cm = CacheManager::connect($memcacheConfig);

$cm->set('one', '1');
$cm->lpush('two', '2'); // generates exception
echo $cm->get('one');


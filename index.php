<?php
include 'vendor/autoload.php';

use Snubes\Cache\CacheManager;
use Snubes\Cache\Service\Redis;
use Snubes\Cache\Service\Memcache;


$redisManager = new CacheManager(new Redis());

$redisManager->connect('somehost','121');
$redisManager->set('one','1');
$redisManager->lpush('two','1'); 
$redisManager->lpush('two','2'); 
echo $redisManager->get('one');

$memcacheManager = new CacheManager(new Memcache());

$memcacheManager->connect('somehost','121');
$memcacheManager->set('one','1');
$memcacheManager->lpush('two','2'); // generates exception
echo $memcacheManager->get('one');


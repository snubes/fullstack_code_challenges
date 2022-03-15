<?php
include 'RedisCacheManager.php';
include 'MemCacheCacheManager.php';


$redis = new RedisCacheManager();

$redis->connect('127.0.0.1', '6379');
$redis->set('one', '1');
$redis->lPush('two', '1');
$redis->lPush('two', '2');
echo $redis->get('one') . PHP_EOL;

$memcache = new MemCacheCacheManager();
$memcache->connect('127.0.0.1', '11211');
$memcache->set('one', '1');
$memcache->lPush('two', '2'); // generates exception
echo $memcache->get('one') . PHP_EOL;

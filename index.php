<?php

require 'vendor/autoload.php';

$redisConfig = new \Snubes\Drivers\RedisConfig();
// I can use service container but maybe not for now it's fine to implement it like this
// if we will implement more services we can do that
try {
    $cacheServiceRedis = new \Snubes\CacheService(\Snubes\Interfaces\CacheDriverInterface::REDIS);

} catch (\Snubes\Exceptions\CacheServiceException $exception) {
    echo "Invalid cache driver name provided";
    exit;
}

$cacheServiceRedis->connect($redisConfig->getHost(), $redisConfig->getPort());
$cacheServiceRedis->set('one', '1');

try {
    $cacheServiceRedis->lpush('two', '1');
    $cacheServiceRedis->lpush('two', '2');
} catch (\Snubes\Exceptions\CacheServiceException $exception) {
    echo $exception->getMessage();
    exit;
}


/////////////////////////////////////////////////////
/// memcache

$memcacheConfig = new \Snubes\Drivers\MemcacheConfig();
// I can use service container but maybe not for now it's fine to implement it like this
// if we will implement more services we can do that
try {
    $cacheServiceMemcache = new \Snubes\CacheService(\Snubes\Interfaces\CacheDriverInterface::MEMCACHE);

} catch (\Snubes\Exceptions\CacheServiceException $exception) {
    echo "Invalid cache driver name provided";
    exit;
}

$cacheServiceMemcache->connect($memcacheConfig->getHost(), $memcacheConfig->getPort());
$cacheServiceMemcache->set('one', '1');

try {
    $cacheServiceMemcache->lpush('two', '1');
} catch (\Snubes\Exceptions\CacheServiceException $exception) {
    echo $exception->getMessage();
    exit;
}

echo $cacheServiceMemcache->get('one');

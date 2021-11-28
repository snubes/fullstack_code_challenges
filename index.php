<?php

require_once('vendor/autoload.php');

use App\CacheFactory;
use App\MemcachedAdapter;
use App\RedisAdapter;

try {

    $cacheManager = CacheFactory::make(RedisAdapter::class);
    $cacheManager->set('one', '1');
    $cacheManager->lpush('two', '1');
    $cacheManager->lpush('two', '2');
    echo $cacheManager->get('one') . PHP_EOL;

    $cacheManager = CacheFactory::make(MemcachedAdapter::class);
    $cacheManager->set('one', '1');
    echo $cacheManager->get('one') . PHP_EOL;

    $cacheManager->lpush('two', '2');  // generates exception
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

<?php

use Services\Cache\CacheManagerFactory;
use Services\Cache\MemcacheCacheManager;
use Services\Cache\RedisCacheManager;

require_once('vendor/autoload.php');

try {
    /** @var RedisCacheManager $redisCacheManger */
    $redisCacheManger = CacheManagerFactory::make(RedisCacheManager::class);
    $redisCacheManger->connect('somehost', '121');
    $redisCacheManger->set('one', '1');
    $redisCacheManger->lpush('two', '1');
    $redisCacheManger->lpush('two', '2');
    echo $redisCacheManger->get('one');
} catch (Throwable $exception) {
    echo $exception->getMessage();
}

try {
    /** @var MemcacheCacheManager $memcacheCacheManger */
    $memcacheCacheManger = CacheManagerFactory::make(MemcacheCacheManager::class);
    $memcacheCacheManger->connect('somehost', '121');
    $memcacheCacheManger->set('one', '1');
    $memcacheCacheManger->lpush('two', '2'); // generates exception
    echo $memcacheCacheManger->get('one');

} catch (Throwable $exception) {
    echo $exception->getMessage();
}

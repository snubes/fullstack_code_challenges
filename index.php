<?php

require __DIR__ . "/vendor/autoload.php";

use Snubes\FullStackCodeChallenges\CacheManagerChallenge\Cache;

if (php_sapi_name() === "cli") {
    $cacheManager = new Cache();
    $redis = $cacheManager->createRedisInstance();
    $memcached = $cacheManager->createMemcachedInstance();

    $redis->connect('somehost','121');
    $redis->set('one','1');
    $redis->lpush('two','1');
    $redis->lpush('two','2');
    echo $redis->get('one');

    $memcached->connect('somehost','121');
    $memcached->set('one','1');
    $memcached->lpush('two','2'); // method not found
    echo $memcached->get('one');
}

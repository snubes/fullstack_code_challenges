<?php
$cacheManager = CacheManager::getInstance();
$redis = $cacheManager->getRedisInstance->connect('somehost', '121');
$redis->set('one', '1');
$redis->lpush('two', '1');
$redis->lpush('two', '2');
echo $redis->get('one');


$memcache = $cacheManager->getMemcacheInstance->connect('somehost', '121');
$memcache->set('one', '1');
echo $memcache->get('one');

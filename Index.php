<?php
// Redis
$cache=new RedisCache();
$connectRedis=new ConnectClass();
$connectRedis->connectCache('somehost','121', $cache->getCacheValue());
$cache->setKey('one','1');
$cache->lpushKey('two','1');
$cache->lpushKey('two','2');
$getRedis = new GetClass();
echo $getRedis->getKey('one', $cache->getCacheValue());

//Memcache
$cache=new MemCache();
$connectMemcache=new ConnectClass();
$connectMemcache->connectCache('somehost','121', $cache->getCacheValue());
$cache->setKey('one','1');
$cache->lpushKey('two','2');
$getMemcache = new GetClass();
echo $getMemcache->getKey('one', $cache->getCacheValue());

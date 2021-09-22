<?php

/** 
 * User: Hakim
 * Date: 09.21.21
 * Time: 22:30
 */

require_once('CacheManagerRedis.php');
require_once('CacheManagerMemcache.php');

Abstract class CacheManager 
{
    protected $cache;

    public function get(string $key)
    {
        return $this->cache->get($key);
    } 

    abstract function connect(string $host, string $port);

    abstract function set(string $key, string $value, string $is_compressed=null, string $ttl=null);
    
    abstract function lpush(string $key, string $value);
}

//$cm= new CacheManager();
//$cm->setCache('redis');
$redis = new CacheManagerRedis();
$redis->connect('somehost','121');
$redis->set('one','1');
$redis->lpush('two','1');
$redis->lpush('two','2');
echo $redis->get('one');

//$cm->setCache('memcache');
$memcache = new CacheManagerMemcache();
$memcache->connect('somehost','121');
$memcache->set('one','1');
$memcache->lpush('two','2'); // generates exception
echo $memcache->get('one');

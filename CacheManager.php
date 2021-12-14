<?php
/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */

interface Cache {
    public function connect(string $host, string $port);
    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null);
    public function get(string $key);
    public function lpush(string $key, string $value);
}

class Redis implements Cache {

    private $cache;

    public function connect(string $host, string $port) {
        $this->cache->connect($host, $port);
    }

    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null) {
        $this->cache->set($key, $value, $ttl);
    }

    public function get(string $key) {
        return $this->cache->get($key);
    }

    public function lpush(string $key, string $value) {
        $this->cache->lPush($key,$value);
    }
}

class Memcache implements Cache {

    private $cache;

    public function connect(string $host, string $port) {
        $this->cache->connect($host, $port);
    }

    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null) {
        $this->cache->set($key, $value, $is_compressed, $ttl);
    }

    public function get(string $key){
        return $this->cache->get($key);
    }

    public function lpush(string $key, string $value){
        throw new \Exception("method not supported");
    }
}

class CacheManager
{
    public function getCache(string $cachingSystem): Cache
    {
        switch ($cachingSystem) {
            case "redis":
                return new Redis();
                break;
            case "memcache":
                return new Memcache();
                break;
            default:
                throw new \Exception("Cache Manager Not Found");
        }
        return $this->cache;
    }
}

$cm = new CacheManager();
$cache = $cm->getCache('redis');
$cache->connect('somehost', '121');
$cache->set('one','1');
$cache->lpush('two','1');
$cache->lpush('two','2');
echo $cache->get('one');

$cache = $cm->getCache('memcache');
$cache->connect('somehost','121');
$cache->set('one','1');
$cache->lpush('two','2'); // generates exception
echo $cache->get('one');



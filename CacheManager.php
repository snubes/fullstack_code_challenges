<?php

namespace Cache;

class MemCacheSystem implements CacheSystemInterface
{

    private $system;

    public function __construct()
    {
        $this->system = new \Memcache();
    }

    public function set($key, $value, $isCompressed, $ttl)
    {
        $this->system->set($key, $value, $isCompressed, $ttl);
    }

    public function connect($host, $port)
    {
        $this->system->connect($host, $port);
    }

    public function get($key)
    {
        return $this->system->get($key);
    }

    public function lpush($key, $value)
    {
        throw new \Exception('Method not supported');
    }
}

interface CacheSystemInterface
{
    public function connect($host, $port);

    public function get($key);

    public function lpush($key, $value);
}

class RedisCacheSystem implements CacheSystemInterface
{

    private $system;

    public function __construct()
    {
        $this->system = new \Redis();
    }

    public function connect($host, $port)
    {
        $this->system->connect($host, $port);
    }

    public function set($key, $value, $ttl = 3000)
    {
        $this->system->set($key, $value, $ttl);
    }

    public function get($key)
    {
        return $this->system->get($key);
    }

    public function lpush($key, $value)
    {
        $this->system->lpush($key, $value);
    }
}

/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */
class CacheManager
{
    private CacheSystemInterface $cache;

    public function setCache(CacheSystemInterface $cachingSystem)
    {
        $this->cache = $cachingSystem;
    }

    public function getCache(): CacheSystemInterface
    {
        return $this->cache;
    }

    public function connect(string $host, string $port)
    {
        $this->cache->connect($host, $port);
    }

    public function get(string $key)
    {
        return $this->cache->get($key);
    }

    public function lpush(string $key, string $value)
    {
        $this->cache->lPush($key, $value);
    }

}

$cm = new CacheManager();

$cm->setCache(new RedisCacheSystem());
$cm->connect('somehost', '121');
$cm->getCache()->set('one', '1');
$cm->lpush('two', '1');
$cm->lpush('two', '2');
echo $cm->get('one');

$cm->setCache(new MemCacheSystem());
$cm->connect('somehost', '121');
$cm->getCache()->set('one', '1', 1,'5000');
$cm->lpush('two', '2'); // generates exception
echo $cm->get('one');


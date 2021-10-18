<?php
/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */

class CacheManager
{
    private $cache;

    /**
     * CacheManager constructor
     *
     * @param string $cachingSystem
     * @param string $host
     * @param string $port
     */
    public function __construct(string $cachingSystem, string $host, string $port)
    {
        switch ($cachingSystem) {
            case "redis":
                $this->cache = new \Redis();
                break;
            case "memcache":
                $this->cache = new \Memcache();
                break;
            default:
                throw new \Exception("Cache Manager Not Found");
        }

        $this->cache->connect($host, $port);
    }

    /**
     * Sets the cache
     *
     * @param string $key
     * @param string $value
     * @param string|null $isCompressed
     * @param string|null $ttl
     */
    public function set(string $key, string $value, ?string $isCompressed, ?string $ttl): void
    {
        if ($this->cache instanceof \Memcache) {
            $this->cache->set($key, $value, $isCompressed, $ttl);
        } else {
            $this->cache->set($key, $value, $ttl);
        }
    }

    /**
     * Gets the cache
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->cache->get($key);
    }

    /**
     * Push method
     *
     * @param string $key
     * @param string $value
     */
    public function lPush(string $key, string $value): void
    {
        if ($this->cache instanceof \Redis) {
            $this->cache->lPush($key, $value);
        } else {
            throw new \Exception("method not supported");
        }
    }
}

$cm = new CacheManager('redis', 'somehost', '121');

$cm->set('one', '1', null, null);
$cm->lPush('two', '1');
$cm->lPush('two', '2');
echo $cm->get('one');

$cm = new CacheManager('memcache', 'somehost', '123');
$cm->set('one', '1', null, null);
$cm->lPush('two', '2'); // generates exception
echo $cm->get('one');



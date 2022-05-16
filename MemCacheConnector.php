<?php

declare(strict_types = 1);

class MemCacheConnector implements CacheManagerInterface
{
    private Memcache $memcache;

    public function __construct ()
    {
        $this->memcache = new Memcache();
    }

    public function set (string $key, string $value, ?string $is_compressed = null, ?string $ttl = null) : CacheManagerInterface
    {
        $this->memcache->set($key, $value, $is_compressed, $ttl);

        return $this;
    }

    public function get (string $key) : string
    {
        return $this->memcache->get($key);
    }

    public function connect (string $host, string $port) : CacheManagerInterface
    {
        $this->memcache->connect($host, $port);

        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return CacheManagerInterface
     * @throws Exception
     */
    public function lpush (string $key, string $value) : CacheManagerInterface
    {
        throw new Exception('method not supported');
    }
}

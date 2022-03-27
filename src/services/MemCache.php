<?php

namespace App\services;

use App\services\AbstractCache;
use \Memcache;

class MemCache extends AbstractCache
{
    protected $cache;

    public function __construct()
    {
        $this->cache = new Memcache();
    }

    /**
     * @param string $key
     * @param string $value
     * @param string|null $isCompressed
     * @param string|null $ttl
     */
    public function set(string $key, string $value, ?string $isCompressed = null, ?string $ttl = null): void
    {
        try {
            $this->set($key, $value, $isCompressed, $ttl);
        } catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}
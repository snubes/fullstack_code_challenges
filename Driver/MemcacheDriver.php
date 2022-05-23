<?php

namespace App\Cache\Driver;

use Memcache;

class MemcacheDriver extends CacheDriver
{
    private Memcache $memcache;

    public function __construct()
    {
        $this->memcache = new Memcache();
    }

    public function getDriver(): Memcache
    {
        return $this->memcache;
    }
}

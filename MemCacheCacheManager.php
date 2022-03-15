<?php

include_once 'CacheManager.php';

class MemCacheCacheManager extends CacheManager
{

    public function __construct()
    {
        $this->cache = new Memcache();
    }

}



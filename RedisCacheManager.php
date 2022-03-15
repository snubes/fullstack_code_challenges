<?php

include_once 'CacheManager.php';

class RedisCacheManager extends CacheManager
{

    public function __construct()
    {
        $this->cache = new Redis();
    }

}



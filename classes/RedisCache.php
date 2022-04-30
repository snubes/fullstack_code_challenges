<?php

namespace App\Classes;

use App\Interfaces\lPushSupport;

class RedisCache extends Cache implements lPushSupport
{
    
    public function setCache()
    {
        $this->cache = new \Redis();
    }

    public function set(...$args){
        list($key,$value,$ttl) = $args;
        $this->cache->set($key,$value,$ttl);
    }    

    public function lpush(string $key, string $value){
            $this->cache->lPush($key,$value);
    }

}

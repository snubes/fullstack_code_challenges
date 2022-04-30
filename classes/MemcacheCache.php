<?php

namespace App\Classes;

class MemcacheCache extends Cache 
{
    public function setCache()
    {
        $this->cache = new \Memcache();
    }
    
    public function set(...$args){
        list($key,$value,$ttl,$is_compressed) = $args;
        $this->cache->set($key,$value,$is_compressed,$ttl);
    }    
}

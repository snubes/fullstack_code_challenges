<?php

/**
 * User: Hakim
 * Date: 09.21.21
 * Time: 22:30
 */

class CacheManagerRedis extends CacheManager
{
    public function __construct()
    {
        //parent::setCache("redis");
        $this->cache=new \Redis();
    }

    public function connect(string $host, string $port)
    {
        try {
            $this->cache->connect($host,$port);
        }catch(Exception $e){
             echo $e->getMessage();//"connection faild"
        }        
    }

    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null)
    {
        $this->cache->set($key,$value,$ttl);
    }   

    public function lpush(string $key, string $value)
    {
        $this->cache->lPush($key,$value);
    }
}

<?php

class CacheManager
{
    private $cache;

    public function setCache(string $cachingSystem)
    {
        switch ($cachingSystem){

            case "redis":
                $this->cache=new \Redis();
                break;
            case "memcache":
                $this->cache=new \Memcache();
                break;
            default:
                throw new \Exception("Cache Manager Not Found");

        }

    }

    public function connect(string $host, string $port){
        try {

            $this->cache->connect($host,$port);
        } catch (\Exception $e) {
             //throw $e;
             echo 'Message: ' .$e->getMessage();
        }
    }

    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null){
        
        if($this->cache instanceof \Memcache)
            try {
                $this->cache->set($key,$value,$is_compressed,$ttl);
            } catch (\Exception $e) {
                //throw $e;
                echo 'Message: ' .$e->getMessage();
            }
            
        else if($this->cache instanceof \Redis)
            try {
                //code...
                $this->cache->set($key,$value,$ttl);
            } catch (\Exception $e) {
                //throw $e;
                echo 'Message: ' .$e->getMessage();
            }
           
    }

    public function get(string $key){

        try {
            //code...
            return $this->cache->get($key);

        } catch (\Exception $e) {
            //throw $e;
            echo 'Message: ' .$e->getMessage();
        }
    }

    public function lpush(string $key, string $value){

        if($this->cache instanceof \Memcache)
            throw new \Exception("method not supported");
        else if($this->cache instanceof \Redis)
            try {
                //code...
                $this->cache->lPush($key,$value);
            } catch (\Exception $e) {
                //throw $e;
                echo 'Message: ' .$e->getMessage();
            }

    }


}

<?php
/** 
 * User: Hakim
 * Date: 09.21.21
 * Time: 22:00
 */

class CacheManagerMemcache  extends CacheManager 
{

    public function __construct()
    {
        //parent::setCache("Memcache");
        $this->cache= new \Memcache();
    }

    public function connect(string $host, string $port)
    {
        try {
            $this->cache->connect($host,$port);
        }catch(Exception $e){
             echo $e->getMessage();//"connection faild";
        }        
    }

    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null)
    {
        $this->cache->set($key, $value, $is_compressed, $ttl);
    }

    public function lpush(string $key, string $value)
    {
        throw new \Exception("method not supported");
    }
}

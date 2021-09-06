<?php
/**
 * Created by PhpStorm.
 * User: Tansen
 * Date: 05.09.21
 * Time: 23:52
 */

class redisCacheManager
{
    private $cache;
    function __construct(string $host,string $port){
        $this->cache=new \Redis();
        $this->cache->connect($host,$port);       
    }
 
    public function set(string $key, string $value, string $ttl=null){
         $this->cache->set($key,$value,$ttl);
    }

    public function get(string $key){
        return $this->cache->get($key);
    }

    public function lpush(string $key, string $value){
        $this->cache->lPush($key,$value);
    }
}


class memCacheManager
{
    private $cache;
    function __construct(string $host,string $port){
        $this->cache=new \Memcache();
        $this->cache->connect($host,$port);       
    }   

    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null){
             $this->cache->set($key,$value,$is_compressed,$ttl);      
    }

    public function get(string $key){
        return $this->cache->get($key);
    }

  }

$cmerdis=new redisCacheManager('somehost','121');
$cmredis->set('one','1');
$cmredis->lpush('two','1');
$cmredis->lpush('two','2');
echo $cmredis->get('one');

$memcm=new memCacheManager('somehost','121');
$memcm->set('one','1');
echo $memcm->get('one');
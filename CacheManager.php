<?php
/**
 * User: dragan
 * Date: 18.01.22
 * Time: 10:30
 */

class CacheManager
{
    private $cache;

    public function setCache(string $cachingSystem)
    {
        switch ($cachingSystem) {

            case "redis":
                $this->cache = new \Redis();
                break;
            case "memcache":
                $this->cache = new \Memcache();
                break;
            default:
                throw new \Exception("Cache Manager Not Found");

        }

    }

    public function connect(string $host, string $port){

        try {
            $this->cache->connect($host,$port);
        } catch (Exception $e) {
            echo ( "Cannot connect to cache server:".$e->getMessage() );
        }      

    }

    public function set(string $key, string $value, $is_compressed=null, $ttl = null): bool{

        if($this->cache instanceof \Memcache && isset($key)) {
                $this->cache->set($key,$value,$is_compressed,$ttl);
            return true;
        } else if($this->cache instanceof \Redis && isset($key)) {        
                $this->cache->set($key,$value,$ttl);
            return true;
        } else {         
                throw new \InvalidArgumentException("Key doesn't exist");
            return false;
        }

    }

    public function get(string $key): bool{

        if (isset($key)) {
                return $this->cache->get($key);
            return true;
        } else  {            
                throw new \Exception("Key doesn't exist");
            return false;
        }

    }

    public function lpush(string $key, string $value){

        if($this->cache instanceof \Memcache || $this->cache instanceof \Redis) {
            $this->cache->lPush($key,$value);
        }
        else {
            throw new Exception("method not supported");
        }

    }
}

$cm = new CacheManager();

$cm->setCache('redis');
$cm->connect('localhost','6379');
$cm->set('one','1');
$cm->lpush('two','1');
$cm->lpush('two','2');
echo $cm->get('one');

$cm->setCache('memcache');
$cm->connect('localhost','11211');
$cm->set('one','1');
try{
    $cm->lpush('two','2');
} catch (Exception $e) {
    echo 'Message: ' .$e->getMessage();
}
echo $cm->get('one');

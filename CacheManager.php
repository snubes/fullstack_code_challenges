<?php
/**
 * Created by PhpStorm.
 * User: Najib
 * Date: 03.10.21
 * Time: 02:17
 */
interface CacheSystemInterface 
{
    public function connect(string $host, string $port);
    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null);
    public function get(string $key);
}

class MemcacheSystem implements CacheSystemInterface
{

    protected $memcache;

    public function __construct()
    {
        // can be injected to the constructor if DIC is implemented in the app
        $this->memcache = new \Memcache();
    }

    // with Dependency Injection Container 
    // public function __construct(\Memcache $memcache)
    // {
    //     // can be injected to the constructor if DIC is implemented in the app
    //     $this->memcache = $memcache;
    // }

    public function connect(string $host, string $port) { 
        $this->memcache->connect($host,$port);
    }

    public function set(string $key, string $value, ?string $is_compressed = null, ?string $ttl = null) { 
        $this->memcache->set($key,$value,$is_compressed,$ttl);
    }

    public function get(string $key) { 
        return $this->memcache->get($key);
    }
    
}

class RedisSystem implements CacheSystemInterface
{

    protected $redis;

    public function __construct()
    {
        // can be injected to the constructor if DIC is implemented in the app
        $this->redis = new \Redis();
    }

    // with Dependency Injection Container 
    // public function __construct(\Redis $redis)
    // {
    //     // can be injected to the constructor if DIC is implemented in the app
    //     $this->redis = $redis;
    // }

    public function connect(string $host, string $port) { 
        $this->redis->connect($host,$port);
    }

    public function set(string $key, string $value, ?string $is_compressed = null, ?string $ttl = null) { 
        $this->redis->set($key,$value,$ttl);
    }

    public function get(string $key) { 
        return $this->redis->get($key);
    }

    public function lpush(string $key, string $value) {
        $this->redis->lPush($key,$value);
    }
    
}

class CacheManager
{
    private $cache;
    private $cacheSystem;

    public function __construct(CacheSystemInterface $cacheSystem)
    {
        $this->cache = $cacheSystem;
    }

    public function setCache(CacheSystemInterface $cacheSystem)
    {
        $this->cache = $cacheSystem;
    }

    public function connect(string $host, string $port){

        $this->cache->connect($host,$port);

    }

    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null)
    {
            $this->cache->set($key,$value,$is_compressed,$ttl);
    }

    public function get(string $key){
        return $this->cache->get($key);
    }

    public function lpush(string $key, string $value){
            if(! $this->cache instanceof RedisSystem) die("Cannot use lpush for this cache system");

            $this->cache->lpush($key,$value);
    }

}


$cm=new CacheManager(new RedisSystem);

$cm->connect('somehost','121');
$cm->set('one','1');
$cm->lpush('two','1');
$cm->lpush('two','2');
echo $cm->get('one');

$cm->setCache(new MemcacheSystem);
$cm->connect('somehost','121');
$cm->set('one','1');
$cm->lpush('two','2'); // generates exception
echo $cm->get('one');

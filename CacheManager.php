<?php
/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */

class CacheManager
{
    private $cache;

    public function __constructor($chacheObj, $host, $port)
    { 
        try{
            // Creating object inside another class is not good practice. Here we are passign it to constructor.

            if (!is_object($chacheObj)) {
                throw new \Exception("first parameter must be an object.");
            }
            $this->cache = $chacheObj;

            // As connect method is common for both Redis as well as Memcache

            $this->cache->connect($host,$port);
        }catch(Exception $e){
            echo  $e->getMessage();
        }
    }
    
    /*public function setCache(string $cachingSystem)
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

        $this->cache->connect($host,$port);

    }
    */
    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null){

        if($this->cache instanceof \Memcache)
            $this->cache->set($key,$value,$is_compressed,$ttl);
        else if($this->cache instanceof \Redis)
            $this->cache->set($key,$value,$ttl);
    }

    public function get(string $key){

        return $this->cache->get($key);
    }

    public function lpush(string $key, string $value){

        if($this->cache instanceof \Memcache)
            throw new \Exception("method not supported");
        else if($this->cache instanceof \Redis)
            $this->cache->lPush($key,$value);

    }


}

try{
    $redisObj = new Redis();
    // Here we are passing Object from oustide of CacheManager along with host and port.
    $cm=new CacheManager($redisObj, 'somehost','121');
    $cm->set('one','1');
    $cm->lpush('two','1');
    $cm->lpush('two','2');
    echo $cm->get('one');

    $memObj = new Memcache();

    $cm1=new CacheManager($memObj, 'somehost','121');
    $cm1->set('one','1');
    $cm1->lpush('two','2');
    echo $cm1->get('one');
    
}catch(Exception $e){
    echo  $e->getMessage();
}
/*
$cm=new CacheManager();

$cm->setCache('redis');
$cm->connect('somehost','121');
$cm->set('one','1');
$cm->lpush('two','1');
$cm->lpush('two','2');
echo $cm->get('one');

$cm->setCache('memcache');
$cm->connect('somehost','121');
$cm->set('one','1');
$cm->lpush('two','2'); // generates exception
echo $cm->get('one');
*/

?>
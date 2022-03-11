<?php
/**
 * User: Mehedi Hassan Durjoi
 * Date: 11.03.22
 */

namespace Snubes\Cache;

use Snubes\Cache\Interface\CacheBaseInterface;
use Snubes\Cache\Interface\CachePushInterface;

/**
 * CacheManager class for handling caching
 */
class CacheManager
{
    /**
     * Storing cache service instance
     *
     * @var CacheBaseInterface
     */
    private CacheBaseInterface $cache;

    /**
     * Constructing CacheManager object with following 
     * Dependency Inversion Principle and Open Close Principle.
     * We can easily create another type of cache service implementing 
     * CacheBaseInterface and pass the object instanche in CacheManager 
     *
     * @param CacheBaseInterface $cachingSystem
     */
    public function __construct(CacheBaseInterface $cachingSystem)
    {
        $this->cache = $cachingSystem;
    }

    /**
     * Calling connect method of cache service instance
     *
     * @param string $host
     * @param string $port
     * @return void
     */
    public function connect(string $host, string $port){

        $this->cache->connect($host,$port);

    }

    /**
     * Calling set method of cache service instance 
     * Following ocp and lsp
     *
     * @param string $key
     * @param string $value
     * @param string|null $is_compressed
     * @param string|null $ttl
     * @return void
     */
    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null){
        $this->cache->set($key,$value,$is_compressed,$ttl);
    }

    /**
     * Calling get method of cache service instance 
     *
     * @param string $key
     * @return value
     */
    public function get(string $key){

        return $this->cache->get($key);
    }

    /**
     * Calling lpush function of cache service instance which implemented CachePushInterface
     * With this procedure this method is not violating ocp and lsp. 
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public function lpush(string $key, string $value){

        /**
         * Befor pushing the value, we need to check is this cache service instance
         * is implemented CachePushInterface or not. If it implements CachePushInterface, 
         * lPush method will must exist. Otherwise, generate exception
         */
        if($this->cache instanceof CachePushInterface)
            $this->cache->lPush($key,$value);
        else
            throw new \Exception("method is not supported");
    }


}




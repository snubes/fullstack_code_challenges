<?php
/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */

namespace Snubes\CodeChallenge;

use Snubes\CodeChallenge\CacheService\AbstractCachingSystem;
use Snubes\CodeChallenge\CacheService\CachingSystem\Exception\UnsupportedCacheMethodException;
use Snubes\CodeChallenge\CacheService\CachingSystemFactory;
use Snubes\CodeChallenge\CacheService\PushCacheInterface;

class CacheManager
{
    /**
     * @var AbstractCachingSystem
     */
    private $cache;

    /**
     * @param string $cachingSystem
     * @throws \Exception
     */
    public function setCache(string $cachingSystem):void
    {
        $this->cache = CachingSystemFactory::build($cachingSystem);
    }

    /**
     * @param string $host
     * @param string $port
     */
    public function connect(string $host, string $port):void
    {
        $this->cache->connect($host,$port);
    }

    /**
     * @param string $key
     * @param string $value
     * @param string|null $is_compressed
     * @param string|null $ttl
     */
    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null):void
    {
        $this->cache->set($key,$value,$is_compressed,$ttl);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->cache->get($key);
    }

    /**
     * @param string $key
     * @param string $value
     * @throws \Exception
     */
    public function lpush(string $key, string $value)
    {
        if (!$this->cache instanceof PushCacheInterface){
            throw new UnsupportedCacheMethodException();
        }

        $this->cache->lPush($key,$value);
    }

}

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
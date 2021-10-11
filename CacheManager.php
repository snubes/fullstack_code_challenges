<?php

use Snudes\Contracts\CacheInterface;
use Snudes\Contracts\CacheItem;

/**
 * Created by vscode.
 * User: Ayoola Olojede
 * Date: 11.10.21
 * Time: 10:14
 */

class CacheManager implements CacheInterface
{
    private $cache;
    private static $instance;

    public function __construct()
    {
        self::$instance = $this;
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function setCache(string $cachingSystem, CacheItem $cacheItem)
    {
        $this->setCache($cachingSystem, $cacheItem);
        $this->cache = $cacheItem;
    }

    protected function getRedisInstance()
    {
        return new Redis();
    }

    protected function getMemcacheInstance()
    {
        return new Memcache();
    }
}

$cacheManager = CacheManager::getInstance();

$cacheManager->setCache('redis', new Redis());
$redis = $cacheManager->getRedisInstance->connect('somehost', '121');
$redis->set('one', '1');
$redis->lpush('two', '1');
$redis->lpush('two', '2');
echo $redis->get('one');

$cacheManager->setCache('memcache', new Memcache());
$memcache = $cacheManager->getMemcacheInstance->connect('somehost', '121');
$memcache->set('one', '1');
echo $memcache->get('one');

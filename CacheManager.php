<?php
/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */

class CacheManager
{
    /**
     * @var Context
     */
    private Context $cache;

    public function setCache(string $cachingSystem)
    {
        $this->cache = match ($cachingSystem) {
            'redis' => new Context(new RedisStrategy()),
            'memcache' => new Context(new MemcacheStrategy()),
            default => throw new \Exception("Cache Manager Not Found"),
        };

    }

    public function set(string $key, string $value)
    {
        $this->cache->set($key, $value);
    }

    public function get(string $key): array
    {
        return $this->cache->get($key);
    }

    /**
     * @throws Exception
     */
    public function lpush(string $key, string $value): bool|int
    {
        if ($this->cache instanceof LpushStrategy) {
            return $this->cache->lPush($key, $value);
        }

        throw new \Exception("method not supported");
    }
}

$cm = new CacheManager();

$cm->setCache('redis');
$cm->set('one', '1');
$cm->lpush('two', '1');
$cm->lpush('two', '2');
echo $cm->get('one');

$cm->setCache('memcache');
$cm->set('one', '1');
$cm->lpush('two', '2'); // generates exception
echo $cm->get('one');



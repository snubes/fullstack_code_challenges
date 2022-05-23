<?php
/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */
namespace App\Cache;

use App\Cache\Driver\CacheDriverInterface;
use App\Cache\Driver\LeftPushInterface;
use App\Cache\Driver\MemcacheDriver;
use App\Cache\Driver\RedisDriver;
use RuntimeException;

class CacheManager
{
    private CacheDriverInterface $cache;

    public function __construct(CacheDriverInterface $cache)
    {
        $this->cache = $cache;
    }

    public function connect(string $host, string $port): void
    {
        $this->cache->connect($host, $port);
    }

    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null): void
    {
        $this->cache->set($key, $value, $is_compressed, $ttl);
    }

    /**
     * @param  string  $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->cache->get($key);
    }

    public function lpush(string $key, string $value): void
    {
        if (!$this->cache instanceof LeftPushInterface) {
            throw new RuntimeException('Cache driver does not implement LeftPushInterface');
        }
        $this->cache->lpush($key, $value);
    }
}

$cm = new CacheManager(new RedisDriver());
$cm->connect('localhost', '22');
$cm->set('one', '1');
$cm->lpush('key', '1');
$cm->lpush('two', '2');
echo $cm->get('one');

$cm = new CacheManager(new MemcacheDriver());
$cm->connect('localhost', '22');
$cm->set('one', '1');
$cm->lpush('two', '2'); // generates exception
echo $cm->get('one');

<?php
/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */

namespace App;

use App\Exception\MethodNotSupportedException;

class CacheManager
{
    private CacheInterface $cacheAdapter;

    /**
     * @param CacheInterface $cache
     */
    public function __construct(CacheInterface $cache)
    {
        $this->cacheAdapter = $cache;
    }

    /**
     * @param CacheInterface $cacheAdapter
     *
     * @return void
     */
    public function setCacheAdapter(CacheInterface $cacheAdapter): void
    {
        $this->cacheAdapter = $cacheAdapter;
    }

    /**
     * @param string $host
     * @param string $port
     *
     * @return bool
     */
    public function connect(string $host, string $port): bool
    {
        return $this->cacheAdapter->connect($host, $port);
    }

    /**
     * @param string $key
     * @param string $value
     * @param array  $options
     *
     * @return bool
     */
    public function set(string $key, string $value, array $options = []): bool
    {
        return $this->cacheAdapter->set($key, $value, $options);
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key): mixed
    {
        return $this->cacheAdapter->get($key);
    }


    /**
     * @param string $key
     * @param mixed  ...$values
     *
     * @return bool|int
     * @throws MethodNotSupportedException
     */
    public function lpush(string $key, mixed ...$values): bool|int
    {
        if (!($this->cacheAdapter instanceof CacheListInterface)) {
            throw new MethodNotSupportedException();
        }
        return $this->cacheAdapter->lPush($key, ...$values);
    }
}

$cm = new CacheManager(new RedisAdapter('somehost', '121'));
$cm->set('one', '1');
$cm->lpush('two', '1');
$cm->lpush('two', '2');
echo $cm->get('one');

$cm->setCacheAdapter(new MemcacheAdapter('somehost', '121'));
$cm->set('one', '1');
$cm->lpush('two', '2'); // generates exception
echo $cm->get('one');


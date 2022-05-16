<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 *
 * PHP v.7.2+
 */
class CacheManager implements CacheManagerInterface
{
    private CacheManagerInterface $cacheConnector;

    public function __construct (string $cacheConnector)
    {
        $this->cacheConnector = CacheConnectionFactory::connect($cacheConnector);
    }

    public function connect (string $host, string $port) : CacheManagerInterface
    {
        $this->cacheConnector->connect($host, $port);

        return $this;
    }

    public function set (string $key, string $value, string $is_compressed = null, string $ttl = null) : CacheManagerInterface
    {
        $this->cacheConnector->set($key, $value, $is_compressed, $ttl);

        return $this;
    }

    public function get (string $key) : string
    {
        return $this->cacheConnector->get($key);
    }

    public function lpush (string $key, string $value) : CacheManagerInterface
    {
        $this->cacheConnector->lpush($key, $value);

        return $this;
    }
}

try
{
    // if you want to use connection factory then following line
    $redisCache = new CacheManager(CacheConnectionFactory::REDIS);

    $redisCache->connect('somehost', '121')
        ->set('one', '1')
        ->lpush('two', '1')
        ->lpush('two', '2');

    echo $redisCache->get('one');

    $memCache = new CacheManager(CacheConnectionFactory::MEMCACHED);

    $memCache->connect('somehost', '121')
        ->set('one', '1')
        ->lpush('two', '2'); // generates exception
    echo $memCache->get('one');
}
catch (Exception $e)
{
    //TODO write error message to log $e->getMessage()
}

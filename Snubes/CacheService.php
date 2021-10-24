<?php

namespace Snubes;

use Snubes\Exceptions\CacheServiceException;
use Snubes\Exceptions\InvalidCacheDriverNameException;
use Snubes\Interfaces\CacheDriverInterface;
use Snubes\Interfaces\CacheServiceInterface;
use Snubes\Interfaces\LeftPusherInterface;

/**
 * Class CacheService
 * @package Snubes
 */
class CacheService implements CacheServiceInterface
{
    /** @var CacheDriverInterface|LeftPusherInterface $cache */
    private $cacheDriver;

    /**
     * CacheService constructor.
     * @param string $driver
     * @throws CacheServiceException
     */
    public function __construct(string $driver)
    {
        try {
            $this->cacheDriver = CacheDriverFactory::getInstance($driver);

        } catch (InvalidCacheDriverNameException $exception) {
            // maybe we can log this exception
            throw new CacheServiceException("Invalid cache driver name");
        }
    }

    /**
     * @param string $host
     * @param string $port
     * @return mixed|void
     */
    public function connect(string $host, string $port)
    {
        $this->cacheDriver->connect($host, $port);
    }

    /**
     * @param string $key
     * @param string $value
     * @param string|null $is_compressed
     * @param string|null $ttl
     */
    public function set(string $key, string $value, ?string $is_compressed = null, ?string $ttl = null): void
    {
        $this->cacheDriver->set($key, $value, $is_compressed, $ttl);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->get($key);
    }

    /**
     * @param string $key
     * @param string $value
     * @return mixed|void
     * @throws CacheServiceException
     */
    public function lpush(string $key, string $value)
    {
        if(!$this->cacheDriver instanceof LeftPusherInterface) {
            throw new CacheServiceException("Lpush method not defined");
        }

        $this->cacheDriver->lpush($key, $value);
    }
}

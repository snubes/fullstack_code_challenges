<?php

namespace Snubes\Drivers;

use Snubes\Interfaces\CacheConfigInterface;

/**
 * Class MemcacheConfig
 * @package Snubes\Drivers
 */
class MemcacheConfig implements CacheConfigInterface
{
    /**
     * @var string $host
     */
    private string $host;

    /**
     * @var string $port
     */
    private string $port;

    /**
     * MemcacheConfig constructor.
     * @param string $host
     * @param string $port
     */
    public function __construct(string $host="localhost", string $port = "9000")
    {
        $this->host = $host;
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getPort(): string
    {
        return $this->port;
    }
}
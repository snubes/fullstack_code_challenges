<?php

namespace Snubes;

/**
 * Configuration for a CacheManager
 */
class Config
{
    public $driver;
    public $host;
    public $port;

    public function __construct($driver, $host, $port)
    {
        $this->driver = $driver;
        $this->host = $host;
        $this->driver = $port;
    }
}

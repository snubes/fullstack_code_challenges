<?php

namespace Snubes;

/**
 * The Factory for the available cache systems
 */
class CacheManager
{
    /**
     * A factory method for constructiog a cache object
     * @param Config $config
     * @return mixed|void
     */
    public static function connect(Config $config)
    {
        $className = $config->driver . 'Cache';
        if (class_exists($className)) {
            $cacheSystem = new $className();
            $cacheSystem->connect($config->host, $config->port);
            return $cacheSystem;
        }
    }
}



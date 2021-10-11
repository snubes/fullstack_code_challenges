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

    protected function getRedisInstance()
    {
        return new Redis();
    }

    protected function getMemcacheInstance()
    {
        return new Memcache();
    }
}

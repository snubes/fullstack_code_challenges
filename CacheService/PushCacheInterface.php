<?php

namespace Snubes\CodeChallenge\CacheService;

interface PushCacheInterface
{
    /**
     * @param string $key
     * @param string $value
     */
  public function lpush(string $key, string $value):void;
}
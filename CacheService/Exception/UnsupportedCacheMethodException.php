<?php

namespace Snubes\CodeChallenge\CacheService\CachingSystem\Exception;


class UnsupportedCacheMethodException extends SnubesCacheException
{
    protected $message = "method not supported";
}
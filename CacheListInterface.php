<?php

namespace App;

interface CacheListInterface extends CacheInterface
{
    /**
     * @param string $key
     * @param mixed  ...$values
     *
     * @return int|bool
     */
    public function lPush(string $key, mixed ...$values): int|bool;
}
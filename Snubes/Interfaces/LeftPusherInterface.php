<?php

namespace Snubes\Interfaces;

/**
 * Interface LeftPusherInterface
 * @package Snubes\Interfaces
 */
interface LeftPusherInterface
{
    /**
     * @param string $key
     * @param string $value
     * @return mixed
     */
    public function lpush(string $key, string $value);
}
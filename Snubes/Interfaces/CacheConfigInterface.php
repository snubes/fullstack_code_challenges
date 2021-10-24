<?php

namespace Snubes\Interfaces;

/**
 * Interface CacheConfigInterface
 * @package Snubes\Interfaces
 */
interface CacheConfigInterface
{
    /**
     * @return string
     */
    public function getHost(): string;

    /**
     * @return string
     */
    public function getPort(): string;


}

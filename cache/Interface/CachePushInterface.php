<?php
/**
 * User: Mehedi Hassan Durjoi
 * Date: 11.03.22
 */
namespace Snubes\Cache\Interface;

/**
 * Cache service which need push functionality must implements CachePushInterface
 */
interface CachePushInterface 
{
    /**
     * Update Existing Value
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public function lpush(string $key, string $value);
}
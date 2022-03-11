<?php 
/**
 * User: Mehedi Hassan Durjoi
 * Date: 11.03.22
 */
namespace Snubes\Cache\Interface;

/**
 *  Every cache service must implement CacheBaseInterface
 */
interface CacheBaseInterface 
{
    /**
     * For connecting to the service
     *
     * @param string $host
     * @param string $port
     * @return void
     */
    public function connect(string $host, string $port);

    /**
     * Set cache value
     *
     * @param string $key
     * @param string $value
     * @param string|null $is_compressed
     * @param string|null $ttl
     * @return void
     */
    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null);

    /**
     * Get cache value by key
     *
     * @param string $key
     * @return void
     */
    public function get(string $key); 

    
}
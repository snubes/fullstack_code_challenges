<?php

class CacheManager
{
    private $cache;
    
    /**
     * CacheManager constructor.
     *
     * @param string $driver
     * 
     * @param string $host
     * 
     * @param int $port
     */
    public function __construct( string $driver, string $host, int $port )
    {
        $this->connect( $driver, $host, $port );
    }


    /**
     * CacheManager constructor.
     *  
     * @param string  $driver
     * 
     * @param string  $host
     * 
     * @param int  $port
     * 
     * @return $this
     */
    protected function connect( string $driver, string $host, int $port )
    {
        switch ($driver){
            case "redis":
                $this->cache = new \Redis();
                break;

            case "memcache":
                $this->cache = new \Memcache();
                break;

            default:
                throw new \Exception("Cache Manager Not Found");
        }
        
        $this->cache->connect($host, $port);
        return $this;
    }


    /**
     * Get cache data.
     * 
     * @param string $key
     * 
     * @return value
     */
    public function get( string $key )
    {
        return $this->cache->get($key);
    }

    
    /**
     * Set cache data.
     * 
     * @param string $key
     * 
     * @param string $value
     * 
     * @param int $ttl
     * 
     * @param bool $isCompressed
     * 
     * @return response
     */
    public function set(string $key, string $value, int $ttl = null, $isCompressed = null)
    {

        if ( $this->cache instanceof \Memcache ) {
            return $this->cache->set($key, $value, $isCompressed, $ttl);
        }

        if ( $this->cache instanceof \Redis ) {
            return $this->cache->set($key, $value, $ttl);
        }

    }

    /**
     * Insert data to head on redis
     * 
     * @param string $key
     * 
     * @param string $value
     * 
     * @return int
     */
    public function lpush(string $key, string $value)
    {
        if ( $this->cache instanceof \Memcache ) {
            throw new \Exception('Method not supported.');
        }
        
        if ( $this->cache instanceof \Redis ) {
            $this->cache->lPush( $key, $value );
        }
    }


}

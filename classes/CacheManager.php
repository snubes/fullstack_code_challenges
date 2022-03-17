<?php
namespace app;

use app\base\CacheInterface;
use app\CacheInterfacee as CacheInterfaceeAlias;

/**
 * Class CacheManager
 * @package app
 *
 */
class CacheManager implements CacheInterface
{
    protected CacheInterface $_cache;

    public function __construct(CacheInterface $_cache)
    {
        $this->_cache = $_cache;
    }

    /**
     * for checking if called method exist in plugin class or not
     * @param $name
     * @param $arguments
     * @throws \Exception
     */
    public function __call($name, $arguments)
    {
        if(!method_exists($this->_cache, $name)){
            throw new \Exception("method {$name} not exist in cache plugin");
        }
        return call_user_func_array([$this->_cache, $name], $arguments);
    }

    /**
     * @param string $key
     * @return string
     */
    public function get(string $key): string
    {
        return $this->_cache->get($key);
    }


    /**
     * @param string $key
     * @param string $value
     * @param array $options
     */
    public function set(string $key, string $value, array $options = []): void
    {
        $this->_cache->set($key, $value, $options);
    }
}
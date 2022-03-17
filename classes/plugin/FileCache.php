<?php

namespace app\plugin;

use app\base\CacheInterface;
use app\base\CachePluginInterface;

class FileCache implements CacheInterface, CachePluginInterface {

    protected string $cacheDirectory = '.';

    /**
     * @param array $config
     */
    public function __constructor(array $config = []): void
    {
        if(isset($config['dir'])){
            $this->cacheDirectory =$config['dir'];
        }
    }

    /**
     * @param string $key
     * @param string $value
     * @param array $options
     */
    public function set(string $key, string $value, array $options = []): void
    {
        file_put_contents($this->cacheDirectory."/".$key, $value);
    }

    /**
     * @param string $key
     * @return string
     */
    public function get(string $key): string
    {
        $filename = $this->cacheDirectory."/".$key;
        if(file_exists($filename)){
            return file_get_contents($filename);
        }
        return "";
    }
}
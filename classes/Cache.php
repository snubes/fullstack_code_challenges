<?php

namespace App\Classes;

abstract class Cache
{   
    private string $host;
    private string $port;
    private $cache;

    public function setHost(string $host)
    {
        $this->host = $host;
    }

    public function setPort(string $port)
    {
        $this->port = $port;
    }

    public function connect(){
        if (!$this->$host || $this->$port) {
            throw new Exception('Please provide connection information.');
        }
        $this->cache->connect($this->$host , $this->$port); 
    }  

    public function get(string $key){
        return $this->cache->get($key);
    }

    abstract public function set(...$args);
    
    abstract public function setCache();
};

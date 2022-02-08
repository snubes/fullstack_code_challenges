<?php

class RedisClient extends AbstractMemory
{

    public function __construct(\Redis $redis)
    {
        $this->client = $redis;
    }


    public function set(string $key, string $value, string $ttl=null) 
    {
        $this->client->set($key,$value,$ttl);
    }


    public function lpush(string $key, string $value) 
    {
        $this->client->lPush($key,$value);
    }
}


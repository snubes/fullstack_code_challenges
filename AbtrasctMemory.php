<?php

abstract class AbstractMemory implements ManagerInterface {

    protected $client;

    public function connect(string $host, string $port) 
    {
        $this->client->connect($host,$port);
    }

    abstract public function set(string $key, string $value);

    public function get(string $key) 
    {
        return $this->client->get($key);
    }

}
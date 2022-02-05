<?php


class MemcacheStrategy extends  AbstractStrategy implements BaseStrategy
{
    private const HOST = 'localhost:3000';
    private const PORT = 3578;

    public function __construct()
    {
        $this->connection = $this->connect(self::HOST,self::PORT);
    }

    public function connect(string $host, string $port): Memcache
    {
        $memcache = new \Memcache();
        $memcache->connect($host,$port);

        return $memcache;

    }
}
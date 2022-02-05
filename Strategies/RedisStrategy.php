<?php


class RedisStrategy  extends  AbstractStrategy implements BaseStrategy, LpushStrategy
{
    private const HOST = 'localhost:3001';
    private const PORT = 6379;

    public function __construct()
    {
        $this->connection = $this->connect(self::HOST,self::PORT);
    }

    public function lpush(string $key, string $value) : int|false
    {
        return $this->connection->lPush($key,$value);
    }

    public function connect(string $host, string $port): Redis
    {
        $redis = new \Redis();
        $redis->connect($host,$port);

        return $redis;

    }
}
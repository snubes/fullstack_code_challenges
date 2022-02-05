<?php


class AbstractStrategy implements BaseStrategy
{
    protected $connection;

    public function get(string $key): array
    {
        return  $this->connection->get($key);
    }

    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null): bool
    {
        return $this->connection->set($key,$value);
    }

}
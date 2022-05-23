<?php

namespace App;

interface CacheInterface
{
    /**
     * @param string $key
     * @param string $value
     * @param array  $options
     *
     * @return bool
     */
    public function set(string $key, mixed $value, array $options): bool;

    /**
     * @param string     $key
     * @param mixed|null $default
     *
     * @return mixed
     */
    public function get(string $key, mixed $default = null): mixed;


    /**
     * @param string $host
     * @param string $port
     *
     * @return bool
     */
    public function connect(string $host, string $port): bool;
}
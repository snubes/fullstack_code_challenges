<?php


interface BaseStrategy
{
    public function get(string $key): array;

    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null): bool;


}
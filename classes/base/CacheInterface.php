<?php

namespace app\base;

interface CacheInterface
{

    /**
     * @param string $key
     * @param string $value
     * @param array $options
     */
    public function set(string $key, string $value, array $options = []) : void;

    /**
     * @param string $key
     * @return string
     */
    public function get(string $key): string;

}
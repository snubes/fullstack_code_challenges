<?php

namespace app\base;

interface CachePluginInterface
{
    /**
     * we can declare parametrs of this method as array or CacheInterface
     * and merge CacheInterface and CachePluginInterface together
     * @param array $config
     */
    public function __constructor(array $config = []): void;


}
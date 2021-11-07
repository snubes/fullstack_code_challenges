<?php

namespace Cache\Adapter;

/**
 *
 * User: dario
 * Date: 2021-11-04
 * Time: 12:19
 */
interface AdapterPlainInterface
{
    public function set(string $key, string $value, int $ttl = 0);
}

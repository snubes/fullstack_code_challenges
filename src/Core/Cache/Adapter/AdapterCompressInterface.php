<?php

namespace Cache\Adapter;

/**
 *
 * User: dario
 * Date: 2021-11-04
 * Time: 12:19
 */
interface AdapterCompressInterface
{
    public function setCompress(string $key, string $value, int $ttl = 0);
}

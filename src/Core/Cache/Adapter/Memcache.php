<?php

namespace Cache\Adapter;

/**
 *
 * User: dario
 * Date: 2021-11-04
 * Time: 12:20
 */
class Memcache extends AdapterAbstract implements AdapterInterface, AdapterPlainInterface, AdapterCompressInterface
{
    public function setCompress(string $key, string $value, int $ttl = 0): void
    {
        parent::setCompress($key, $value, $ttl);
    }
}

<?php

namespace Cache\Adapter;

/**
 *
 * User: dario
 * Date: 2021-11-04
 * Time: 12:19
 */
class Redis extends AdapterAbstract implements AdapterInterface, AdapterPlainInterface, AdapterLpushInterface
{
    public function lpush(string $key, string $value): void
    {
        $this->set($key, $value);
    }
}

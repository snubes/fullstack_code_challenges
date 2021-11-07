<?php

namespace Cache\Adapter;

/**
 *
 * User: dario
 * Date: 2021-11-04
 * Time: 12:19
 */
interface AdapterInterface
{
    function setAdapter();
    public function get(string $key);
    public function connect(string $host, int $port);
}

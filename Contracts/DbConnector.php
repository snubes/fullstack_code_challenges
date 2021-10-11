<?php

namespace Snudes\Contracts;

interface DbConnector
{
    public function connect(string $driver, string $host, string $port);
}

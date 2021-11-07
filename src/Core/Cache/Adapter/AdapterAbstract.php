<?php

/**
 *
 * User: dario
 * Date: 2021-11-04
 * Time: 12:19
 */
namespace Cache\Adapter;

use Symfony\Component\Yaml\Yaml;

class AdapterAbstract extends MyMemoryCache implements AdapterInterface
{
    protected array $config;
    protected AdapterInterface $adapter;

    protected function getConfig(string $filepath = 'config/cache.yml')
    {
        $value = Yaml::parseFile($filepath);
    }

    public function connect(string $host, int $port) {
        parent::connect($host, $port);
    }

    public function set(string $key, string $value, int $ttl = 0): void
    {
        parent::set($key, $value, $ttl);
    }

    public function get(string $key): ?string
    {
        return parent::get($key);
    }
}

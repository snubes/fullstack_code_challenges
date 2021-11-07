<?php

namespace Cache;

use Cache\Adapter\AdapterInterface;
use Symfony\Component\Yaml\Yaml;

/**
 *
 * User: dario
 * Date: 2021-11-04
 * Time: 12:19
 */
abstract class ManagerAbstract implements ManagerInterface, ManagerPlainInterface
{
    protected array $config = [];
    protected ?AdapterInterface $adapter = null;

    protected function getConfig(string $filepath = 'config/cache.yml')
    {
        if (empty($this->config)) {
            $this->config = Yaml::parseFile($filepath);
        }
    }

    public function __construct(string $host, string $port, AdapterInterface $adapter = null) {
        $this->getConfig();
        $this->setAdapter($adapter);
        $this->adapter->connect($host,$port);
    }

    protected function setAdapter(?AdapterInterface $adapter = null) {
        $this->adapter = $adapter;
    }

    public function set(string $key, string $value, int $ttl = 0): void
    {
        $this->adapter->set($key, $value, $ttl);
    }

    public function get(string $key){

        return $this->adapter->get($key);
    }
}

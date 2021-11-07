<?php

namespace Cache;

use Cache\Adapter\AdapterInterface;
use http\Exception;
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
    protected string $adapterName = '';

    protected function getConfig()
    {
        if (empty($this->adapterName)) {
            throw new \Exception('No cache adapter defined');
        }
        $config = Yaml::parseFile(APP_ROOT.'/config/cache.yml');
        if (isset($config['cache'][$this->adapterName])) {
            $this->config = $config['cache'][$this->adapterName];
            return;
        }
        throw new \Exception('No configuration found for cache adapter '. $this->adapterName);
    }

    public function __construct() {
        $this->getConfig();
        $this->connect();
    }
}

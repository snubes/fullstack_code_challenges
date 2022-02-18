<?php
declare(strict_types=1);

namespace Ilkin\Snubes;

use Symfony\Component\Yaml\Yaml;

abstract class AbstractCacheManager implements CacheManagerInterface
{
    protected function getConfig(string $cacheClientName): array
    {
        $config = Yaml::parseFile(APP_ROOT.'/config/cache.yml');
        if (isset($config['cache'][$cacheClientName])) {
            return $config['cache'][$cacheClientName];
        }

        throw new \Exception('Configuration for '.$cacheClientName.' was not found!');
        //Spending a bit more time I would add a logger (Monolog) there to log the errors properly
    }
}

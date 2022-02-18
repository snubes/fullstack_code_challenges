<?php
declare(strict_types=1);

namespace Ilkin\Snubes;

interface CacheManagerInterface
{
    public function __construct();

    public function get(string $key);
}

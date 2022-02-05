<?php


class Context
{

    /**
     * @var BaseStrategy
     */
    private BaseStrategy $strategy;

    public function __construct(BaseStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function get(string $key): array
    {
        return $this->strategy->get($key);
    }

    public function set(string $key, string $value): bool
    {
        return $this->strategy->set($key, $value);
    }

    public function lpush(string $key, string $value)
    {
        return $this->strategy->lpush($key, $value);
    }

}
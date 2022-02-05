<?php


interface LpushStrategy
{
    public function lpush(string $key, string $value): int|false;

}
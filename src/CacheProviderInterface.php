<?php

namespace Remzikilnc\Cache;

interface CacheProviderInterface
{
    public function get(string $key, string|null $callback = null);

    public function set(string $key, string|null $value, $seconds = 0);

    public function forget(string $key);
}
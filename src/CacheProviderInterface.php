<?php

namespace Remzikilnc\Cache;

interface CacheProviderInterface
{
    public function get(string $key, string|null|\Closure $callback = null);

    public function set(string $key, string|null|\Closure $value, $seconds = 0);

    public function forget(string $key);
}
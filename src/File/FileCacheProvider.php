<?php

namespace Remzikilnc\Cache\File;


use Remzikilnc\Cache\CacheProviderInterface;

class FileCacheProvider implements CacheProviderInterface
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new FileHelper();
    }

    public function get(string $key, ?string $callback = null)
    {
         return $this->helper->readFile($key);

    }

    public function set(string $key, ?string $value, $seconds = 0)
    {
        $this->helper->writeFile($key, $value, $seconds);

    }

    public function forget(string $key)
    {
        $this->helper->delFile($key);

    }
}
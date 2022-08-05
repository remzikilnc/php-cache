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

    public function get(string $key, string|\Closure|null $callback = null, $seconds = 0)
    {
        if ($this->helper->readFile($key) == null) {
            if ($callback instanceof \Closure) {
                $callback = $callback();
            }
            $this->set($key, $callback, $seconds);
            return $this->get($key);
        } else {
            return $this->helper->readFile($key);
        }

    }

    public function set(string $key, string|\Closure|null $value, $seconds = 0)
    {
        $this->helper->writeFile($key, $value, $seconds);

    }

    public function forget(string $key)
    {
        $this->helper->delFile($key);

    }
}
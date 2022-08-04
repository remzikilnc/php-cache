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


        // TODO: Implement get() method.
    }

    public function set(string $key, ?string $value, $seconds = 0)
    {
        $this->helper->writeFile($key, $value, $seconds);

        // TODO: Implement set() method.
    }

    public function forget(string $key)
    {
        $this->helper->delFile($key);

        // TODO: Implement forget() method.
    }
}
$Test = new FileCacheProvider();
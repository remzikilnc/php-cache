<?php

namespace Remzikilnc\Cache;


use Remzikilnc\Cache\CacheProviderInterface;
use Remzikilnc\Cache\File\FileCacheProvider;
use Remzikilnc\Cache\Redis\RedisCacheProvider;

class CacheManager
{
    protected CacheProviderInterface $provider;


    public function __construct()
    {
    }

    public function provider($name = 'file')
    {
        if ($name == 'file') {
            $this->provider = new FileCacheProvider();
        } elseif ($name == 'redis') {
            $this->provider = new RedisCacheProvider();
        } else {
            throw new \Exception("Böyle bir provider tanımlı değil");
        }
        $this->provider = $this->getProvider();
        return $this;
    }

    public function getProvider()
    {
        return $this->provider;
    }
}


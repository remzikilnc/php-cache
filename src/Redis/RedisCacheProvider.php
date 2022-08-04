<?php

namespace Remzikilnc\Cache\Redis;


use Remzikilnc\Cache\CacheProviderInterface;
use \Redis;

class RedisCacheProvider implements CacheProviderInterface
{
    protected $helper;
    protected static $config = [
        'host' => "127.0.0.1",
        'port' => 6379,
        'timeout' => 60,
        'reserved' => null,
        'retryInterval' => 0,
        'readTimeout' => 0.0,
        'auth' => '',
        'dbid' => ''
    ];

    public function __construct()
    {
        $this->helper = new Redis();
        if ($this->helper->connect(static::$config['host'],
            static::$config['port'],
            static::$config['timeout'],
            static::$config['reserved'],
            static::$config['retryInterval'],
            static::$config['readTimeout'])) {
        }

    }

    public function get(string $key, ?string $callback = null)
    {
        return $this->helper->get($key);
    }

    public function set(string $key, ?string $value, $seconds = 0)
    {
        if ($key !== $this->helper->get($key)) {
            $this->helper->set($key, $value);
            $this->helper->expire($key, $seconds);
        }

        // TODO: Implement set() method.
    }

    public function forget(string $key)
    {
        $this->helper->unlink($key);
        // TODO: Implement forget() method.
    }
}
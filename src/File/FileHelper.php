<?php

namespace Remzikilnc\Cache\File;


class FileHelper
{
    public int $time;

    public function writeFile($key, $value, $seconds)
    {
        $fileName = $key;

        file_put_contents($fileName, $value);
        touch($fileName, time() + $seconds);
    }

    public function readFile($key)
    {
        $fileName = $key;
        if (file_exists($fileName)) {
            if (filemtime($fileName) < time()) {
                $this->delFile($fileName);
                return false;
            }
            return file_get_contents($fileName);

        }
    }

    public function delFile($fileName)
    {
        if (file_exists($fileName)) {
            unlink($fileName);
        }
    }
}
<?php

namespace Remzikilnc\Cache\File;

/*TODO
    FileHelper yazma / okuma / silme gibi dosya işlemlerinin sağlanacağı yardımcı sınıftır.
    FileCacheProvider yazılırken dosya işlemlerini sağlayacağınız işlemleri bu sınıfı kullanarak sağlayınız */

class FileHelper
{
    public int $time;
    public function writeFile($key, $value, $seconds)
    {
        $fileName = $key;

        file_put_contents($fileName ,$value);
        touch($fileName,time()+$seconds); //
    }

    public function readFile($key)
    {
        $fileName = $key;
        if (file_exists($fileName) /* && filemtime($fileName) > (time() - $this->time) */) {
            if (filemtime($fileName) < time()){
                $this->delFile($fileName);
                return false;
            }
            return file_get_contents($fileName);

        }
    }
    public function delFile($fileName){
        if (file_exists($fileName)){
            unlink($fileName);
        }
    }
}
<?php
namespace WPhp\lib;
use WPhp\lib\config;

class log
{
    static $class;


    static public function init()
    {
        $drive = config::get('drive', 'log');
        $class = '\WPhp\lib\drive\log\\' . $drive;
        self::$class = new $class;
    }

    static public function log($name, $file = '', $type = 'log')
    {
        $file = empty($file) ? date('YmdH', time()) : $file;
        self::$class->log($name, $file, $type);
    }

}
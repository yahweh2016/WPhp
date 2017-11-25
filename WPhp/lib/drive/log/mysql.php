<?php
namespace WPhp\lib\drive\log;
use WPhp\lib\config;

class mysql
{
    public $path;

    public function __construct()
    {
        $config = config::get('option', 'log');
        $this->path = $config['path'];
    }

    public function log($message, $file, $type)
    {
    }
}
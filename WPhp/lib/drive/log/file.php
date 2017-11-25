<?php
namespace WPhp\lib\drive\log;
use WPhp\lib\config;

class file
{
    public $path;

    public function __construct()
    {
        $config = config::get('option', 'log');
        $this->path = $config['path'];
    }

    public function log($message, $file, $type)
    {
        if ( ! is_dir($this->path . DS . $type))
        {
            mkdir($this->path . DS . $type, '0777', true);
        }

        $message = '[' . date('Y-m-d H:i:s', time()) . '] ' . $message;
        return file_put_contents($this->path . DS . $type . DS . $file . '.log', json_encode($message) . PHP_EOL, FILE_APPEND);
    }
}
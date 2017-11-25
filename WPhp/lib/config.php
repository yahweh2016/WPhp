<?php
namespace WPhp\lib;

class config
{
    static $config = array();


    static public function get($name, $file)
    {
        /**
         * 1.判断配置文件是否存在
         * 2.判断配置是否存在
         * 3.缓存配置
         */
        if (isset(self::$config[$file]))
        {
            return self::$config[$file][$name];
        }

        $path = WPHP . DS . 'config' . DS . $file . '.php';
        if (is_file($path))
        {
            $config = include $path;
            if (isset($config[$name]))
            {
                self::$config[$file] = $config;
                return $config[$name];
            }
            else
            {
                throw new \Exception('没有这个配置项' . $name);
            }
        }
        else
        {
            throw new \Exception('找不到配置文件' . $file);
        }
    }

    /**
     * 获取所有配置
     */
    static public function all($file)
    {
        if (isset(self::$config[$file]))
        {
            return self::$config[$file];
        }

        $path = WPHP . DS . 'config' . DS . $file . '.php';
        if (is_file($path))
        {
            $config = include $path;
            self::$config[$file] = $config;
            return $config;
        }
        else
        {
            throw new \Exception('找不到配置文件' . $file);
        }
    }

}
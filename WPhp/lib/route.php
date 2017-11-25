<?php
namespace WPhp\lib;

class route
{
    public $controller;
    public $action;


    public function __construct()
    {
        /**
         * 1.隐藏index.php
         * 2.获取url 参数部分
         * 3.返回对应的控制器和方法
         */
        $path = $_SERVER['REQUEST_URI'];
        if (isset($path) && $path != '/')
        {
            $path_arr = explode('/', trim($path, '/'));

            if (isset($path_arr[0]))
            {
                $this->controller = $path_arr[0];
            }
            unset($path_arr[0]);

            if (isset($path_arr[1]))
            {
                $this->action = $path_arr[1];
                unset($path_arr[1]);
            }
            else
            {
                $this->action = config::get('action', 'route');
            }

            $count = count($path_arr) + 2;
            $i     = 2;
            while ($i < $count)
            {
                if (isset($path_arr[$i + 1]))
                {
                    $_GET[ $path_arr[$i] ] = $path_arr[$i + 1];
                }
                $i = $i + 2;
            }
        }
        else
        {
            $this->controller = config::get('controller', 'route');
            $this->action     = config::get('action', 'route');
        }
    }

}
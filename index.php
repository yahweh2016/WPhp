<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

define('DS', '\\');
define('ROOT', __DIR__);
define('WPHP', ROOT . DS .'WPhp');
define('APP', ROOT . DS . 'App');
define('MODULE', 'App');
define('DEBUG', true);

include "vendor/autoload.php";

if ( DEBUG )
{
    $whoops = new \Whoops\Run;
    $option = new \Whoops\Handler\PrettyPageHandler();
    $option->setPageTitle('框架出错了');
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_error', 'On');
}
else
{
    ini_set('display_error', 'Off');
}

include WPHP . DS . 'common' . DS . 'function.php';
include WPHP . DS . 'wphp.php';

// 当new的类不存在就会触发这个
spl_autoload_register('\WPhp\wphp::load');

\WPhp\wphp::run();
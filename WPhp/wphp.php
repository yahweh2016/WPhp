<?php
namespace WPhp;

class wphp
{
    public static $classMap = array();
    public $assign;

    static  public function run()
    {
        \WPHP\lib\log::init();
        $route           = new \WPhp\lib\route();
        $controllerClass = $route->controller;
        $action          = $route->action;
        $controllerFile  = APP . DS . 'controller' . DS . $controllerClass . 'Controller.php';
        $controllerClass  = DS . MODULE . DS . 'controller' . DS . $controllerClass . 'Controller';
        if (is_file($controllerFile))
        {
            include $controllerFile;
            $controller = new $controllerClass();
            $controller->$action();
        }
        else
        {
            \WPHP\lib\log::log('找不到控制器' . $controllerClass, '', 'error');
            throw new \Exception('找不到控制器' . $controllerClass);
        }
    }

    /**
     * 自动加载类库
     */
    static public function load($class)
    {
        // new \WPhp\route()
        // $class = '\WPhp\route';
        // ROOT.'/WPhp/route.php';
        $class = str_replace('\\', '/', $class);

        if (isset($classMap[$class]))
        {
            return true;
        }
        else
        {
            $file = $class.'.php';
            if (is_file($file))
            {
                include $file;
                self::$classMap[$class] = $class;
            }
            else
            {
                return false;
            }
        }


    }

    /**
     * 模板变量赋值
     */
    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    /**
     * 显示模板
     */
    public function display($file)
    {
        $file = APP . DS . 'views' . DS . $file . '.php';
        if (is_file($file))
        {
            if ( ! empty($this->assign))
            {
                extract($this->assign);
            }
            include $file;
        }
        else
        {
            throw new \Exception('没找到模板' . $file);
        }
    }

}
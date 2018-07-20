<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/27
 * Time: 10:50
 */

namespace core;
class Application
{
    public static $group;
    public static $controller;
    public static $action;

    public static function run()
    {
        global $c;
        self::$group = isset($_GET['g']) ? $_GET['g'] : $c['default_route']['group'];
        self::$controller = isset($_GET['c']) ? $_GET['c'] : $c['default_route']['controller'];
        self::$action = isset($_GET['a']) ? $_GET['a'] : $c['default_route']['action'];

        self::$group = strtolower(self::$group);
        self::$controller = strtolower(self::$controller);
        self::$action = strtolower(self::$action);

        $controllerName = self::getFullClassName();
        $controllerInstance = new $controllerName;

        $method = self::$action;
        $controllerInstance->$method();
    }

    public static function getFullClassName()
    {
        return "\\application\\" . self::$group . "\\controllers\\" . self::$controller . "Controller";
    }
}
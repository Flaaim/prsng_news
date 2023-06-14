<?php

namespace Wfm;

use Wfm\Controller;

class Router
{
    public static $routes = [];
    public static $route = [];

    public static function add($regex, $route = [])
    {
        self::$routes[$regex] = $route;
    }
    public static function getRoutes()
    {
        return self::$routes;
    }
    public static function getRoute()
    {
        return self::$route;
    }
    public static function dispatch($url)
    {
        if(self::matchRoutes($url)){
           $controller = "App\\Controllers\\".self::$route['admin_prefix'].self::$route['controller']."Controller";
           if(class_exists($controller)){ 
                $controllerObject = new $controller(self::$route);
                $controllerObject->getModel();
                $action = self::$route['action'].'Action';
                if(method_exists($controllerObject, $action)){ 
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw new \Exception("Method $method не найден");
                }
           } else {
                throw new \Exception("Controller $controller не найден");
           }
        }else{
            require_once WWW . "/errors/404.php";
        }
    }
    public static function matchRoutes($url): bool
    {
        foreach(self::$routes as $pattern => $route){ 
            if(preg_match("#{$pattern}#", $url, $matches)){
                foreach($matches as $key => $value){
                    if(is_string($key)){
                        $route[$key] = $value;
                    }
                }
                if(empty($route['action'])){
                    $route['action'] = 'index';
                }
                if(!isset($route['admin_prefix'])){
                    $route['admin_prefix'] = "";
                } else {
                    $route['admin_prefix'] = 'Admin\\';
                } 
                $route['controller'] = self::upperCamelCase($route['controller']);
                $route['action'] = self::setcamelCase($route['action']);
                self::$route = $route;
                return true;
            }

        }
        return false;
    }

    public static function upperCamelCase($str)
    {
        return str_replace('-', '', ucwords($str, '-'));
    }

    public static function setcamelCase($str)
    {
        return lcfirst(self::upperCamelCase($str));
    }

    public static function removeQueryString($url)
    {
        if(str_contains($url, '?')){
            $array = explode('?', $url);
            if(!empty($array[1])){
                $params = explode('&', $array[1]);
                return $params;
            }
            
        }
        return '';
        // return $params;
    }


}
<?php
namespace app;
use Exception;
class Route{
    protected static $routes = [];
    protected static function addRoute ($type , $route,$controller, $method){
        static::$routes = array_merge(static::$toutes,[
            // $route=> [
            //     'type'=> $type,
            //     'method' => $method,
            //     'controller' =>$controller,
            // ]
            ltrim($route, '/')=>[
                'type'=> $type,
                'method' => $method,
                'controller' =>$controller,
            ]
            ]);
            // var_dump (static::routes);
            static::initialRoute($type,$route,static::$routes);

        }

      public static function initialRoute($type,$route,$list){
         if(isset($list[static::segment()]) && $route == static ::segment()){
             $init = $list [static::segment()];
             $controller = $init['controller'];
             $method = $init['method'];
             $type = $init['type'];
             if(class_exists($controller)&& method_exists($controller,$method)){
             (new $controller)->$method();
             }
            // var_dump($init[static::segment()]);
        }
    //else{
    //        throw new Exception('Route'.static::segment().'NotFound');
    //        die();
    // }
}

public static function segment(){
    $project_folder = explode ('\\',getcwd());
    $end = end($project_folder);
    $uri = str_replace('/' .$end.'/','',$_SERVER['REQUEST_URI']);
    return $uri ;
}

public static function get($route, $controller,$method){
    static::addRoute('GET', $route,$controller,$method);
}


public static function post($route, $controller,$method){
    static::addRoute('POST', $route,$controller,$method);
}

}
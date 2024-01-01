<?php 
namespace App;
if (!function_exists('config')){
    function config($fileandparam){
        if(!empty($fileandparam)){
        $exp = explode ('.',$fileandparam);
        $config = include __DIR__. '/../config/' .$exp[0]. '.php';
        return !empty($config[$exp[1]])? $config[$exp[1]]:null;
    }else{
        return null;
    }
}   
}


<?php 
if(!function_exists('success')){
    function success($message){
        return flash()->success($message);
    }
}
if(!function_exists('error')){
    function error($message){
        return flash()->error($message);
    }
}
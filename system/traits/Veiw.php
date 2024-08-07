<?php 

namespace System\Traits;

trait Veiw {
    protected function view ($dir , $vars = null) {
        $dir = str_replace(".","/", $dir);
        if($vars)
            extract($vars);
        $path = realpath(dirname(__FILE__)."/../../app/view/". $dir.".php");
       
        if (file_exists($path)) {
            return require_once $path;
        }else{
            echo "this view {".$dir."} not exist";
            exit;
        }

        
    }
}
<?php

namespace App\Core;
class Router
{
    protected array $routes = [];
    public Request $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }




    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
          $path =   $this->request->getPath();
          $method = $this->request->getMethod();

          $callback = $this->routes[$method][$path] ?? false;

            if($callback === false){
                echo "Not found";
                exit;
            }


            if(is_string($callback)){
                return $this->renderView($callback);
            }

          echo call_user_func($callback);
    }

    public function renderView($view){
        $layoutContact = $this->layoutContact();
        $viewContent = $this->renderOnlyView($view);
        
        return str_replace('{{contact}}',$viewContent,$layoutContact);
    }

    protected function layoutContact()
    {
        ob_start();
        include_once Application::$ROOT_DIT."/views/layouts/main.php";
        return ob_get_clean();
    }


    protected function renderOnlyView($view){
        ob_start();
        include_once Application::$ROOT_DIT."/views/$view.php";
        return ob_get_clean();
    }


}
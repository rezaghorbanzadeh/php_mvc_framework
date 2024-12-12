<?php

namespace App\Core;
class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    /**
     * @param Request $request
     */
    public function __construct(Request $request,Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }




    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
          $path =   $this->request->getPath();
          $method = $this->request->getMethod();

          $callback = $this->routes[$method][$path] ?? false;

            if($callback === false){
               $this->response->setStatusCode(404);
              return $this->renderView("_404");
            }


            if(is_string($callback)){
                return $this->renderView($callback);
            }

          echo call_user_func($callback);
    }

    public function renderView($view , $params = []){
        $layoutContact = $this->layoutContact();
        $viewContent = $this->renderOnlyView($view , $params);
        
        return str_replace('{{contact}}',$viewContent,$layoutContact);
    }
    public function renderContent($viewContent){
        $layoutContact = $this->layoutContact();
        return str_replace('{{contact}}',$viewContent,$layoutContact);
    }

    protected function layoutContact()
    {
        ob_start();
        include_once Application::$ROOT_DIT."/views/layouts/main.php";
        return ob_get_clean();
    }


    protected function renderOnlyView($view, $params){
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIT."/views/$view.php";
        return ob_get_clean();
    }


}
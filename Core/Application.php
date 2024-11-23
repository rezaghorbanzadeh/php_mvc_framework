<?php

namespace App\Core;



class Application {


    public static string $ROOT_DIT;
    public Router $router;
    public Request $request;

    public function __construct($rootPath)
    {
        self::$ROOT_DIT = $rootPath;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
       echo $this->router->resolve();
    }
}
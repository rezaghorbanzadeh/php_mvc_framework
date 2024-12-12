<?php

namespace App\controllers;

use App\Core\Application;
use App\Core\Controller;

class  SiteController extends  Controller
{

    public static function home()
    {
        $params = [
          'name'  =>'reza'
        ];
        return $this->render('home', $params);

    }
    public static function handleContent()
    {
        return "handling content data";
    }


    public static function contact()
    {
        return Application::$app->router->renderView('contact');
    }
}
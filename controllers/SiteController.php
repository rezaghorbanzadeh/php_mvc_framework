<?php

namespace App\controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;

class  SiteController extends  Controller
{

    public static function home()
    {
        $params = [
          'name'  =>'reza'
        ];
        return self::render('home', $params);

    }
    public static function handleContent(Request $request)
    {
       $body =  $request->getBody();

       echo '<pre>';
       var_dump($body);
       echo '</pre>';
       exit();
        return "handling content data";
    }


    public static function contact()
    {
        return Application::$app->router->renderView('contact');
    }
}
<?php

namespace App\controllers;

use App\Core\Application;

class SiteController
{
    public function handleContent()
    {
        return "handling content data";
    }


    public function contact()
    {
        return Application::$app->router->renderView('contact');
    }
}
<?php 

namespace App\Controllers;

class Home extends Controller{
    public function index(){
        $product = 'phone';
        $this->view('app.index',compact('product')) ;   
    }

    public function crate(){
        $this->redirect("home") ;   
    }
}

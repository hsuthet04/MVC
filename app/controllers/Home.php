<?php

class Home extends Controller{
    public function __construct(){
        echo "i am constructor of ".__class__."class<br>";
    }
    public function index(){
        $this->view("home/index");
    }
}

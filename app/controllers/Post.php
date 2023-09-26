<?php

class Post extends Controller{
    public function __construct(){
        //parent::__construct();
        echo "i am constructor of ".__CLASS__."class<br>";
    }
    public function index(){
        echo "i am index method of ".__CLASS__."class<br>";
    }
    public function show($data=[]){
        echo "i have nothing to show";
        echo "<pre>".print_r($data,true)."</pre>";
    }
}
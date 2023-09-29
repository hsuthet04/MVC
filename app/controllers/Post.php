<?php

class Post extends Controller{
    private $postModel;
    private $catModel;
    public function __construct(){
        //parent::__construct();
        $this->postModel=$this->model("PostModel");
        $this->catModel=$this->model("CategoryModel");
    }
    public function home($params=[]){
        //echo $params[0];
        $data=[
            'cats'=>'',
            'posts'=>''
        ];
        $data['cats']=$this->catModel->getAllCategory();
        $data['posts']=$this->postModel->getPostByCatId($params[0]);
        $this->view("admin/post/home",$data);
    }
    // public function show($data=[]){
    //     echo "i have nothing to show of". __class__ ."class<br>";
    //     echo "<pre>".print_r($data,true)."</pre>";
    // }

}
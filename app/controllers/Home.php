<?php

class Home extends Controller{
    private $catModel;
    private $postModel;
    private $userModel;
    public function __construct(){
       $this->userModel=$this->model("UserModel");
       $this->catModel=$this->model("CategoryModel");
       $this->postModel=$this->model("PostModel");
    }
    public function index($params = [])
    {
        $data = $this->userModel->getAllUser();
        $data = [
            'cats' => '',
            'posts'=>'',
            'userposts'=>''
        ];
        $data['cats'] = $this->catModel->getAllCategory();
        $data['posts'] = $this->postModel->getPostByCatId($params[0]);
        $data['userposts']=$this->postModel->getThreeposts();
        $this->view('home/index', $data);
    }
    
}

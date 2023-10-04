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
    public function create(){
        $data=[
            'title'=>'',
            'desc'=>'',
            'file'=>'',
            'content'=>'',
            'title_err'=>'',
            'desc_err'=>'',
            'file_err'=>'',
            'content_err'=>'',
            'cats'=>''        
        ];
        $data['cats']=$this->catModel->getAllCategory();
        if($_SERVER['REQUEST_METHOD']=="POST"){

            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $files=$_FILES['file'];

            $data['title']=$_POST['title'];
            $data['desc']=$_POST['desc'];
            $data['content']=$_POST['content'];

            if(empty($data['title'])){
                $data['title_err']="Title must supply";
            }
            if(empty($data['desc'])){
                $data['desc_err']="Description must supply";
            }
            if(empty($data['content'])){
                $data['content_err']="Content must supply";
            }

            if(empty($data['title_err'])&&empty($data['desc_err'])&&empty($data['content_err'])){
                if(!empty($files['name'])){
                    move_uploaded_file($files['tmp_name'],'assets/uploads/'.$files['name']);
                    if($this->postModel->insertPost($_POST['cat_id'],$data['title'],$data['desc'],$files['name'],$data['content'])){
                        flash("pis","Post insert successfully");
                        redirect(URLROOT."post/home/1");
                    }else{
                        $this->view("admin/post/create",$data); 
                    }
                }else{
                    $this->view("admin/post/create",$data);
                }
            }else{
                $this->view("admin/post/create",$data);
            }
            
        }else{
            $this->view("admin/post/create",$data);
        }
    }
    public function show($params=[]){
        $post=$this->postModel->getPostById($params[0]);
        $this->view('admin/post/show',['post'=>$post]);
    }
    public function edit($params=[]){
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $data=[
                'title'=>'',
                'desc'=>'',
                'file'=>'',
                'content'=>'',
                'title_err'=>'',
                'desc_err'=>'',
                'file_err'=>'',
                'content_err'=>'',
                'cats'=>''        
            ];
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $files=$_FILES['file'];
            $filename=$_FILES['file']['name'];
            
            $data['title']=$_POST['title'];
            $data['desc']=$_POST['desc'];
            $data['content']=$_POST['content'];

            if(empty($data['title'])){
                $data['title_err']="Title must supply";
            }
            if(empty($data['desc'])){
                $data['desc_err']="Description must supply";
            }
            if(empty($data['content'])){
                $data['content_err']="Content must supply";
            }
            if(empty($data['title_err'])&&empty($data['desc_err'])&&empty($data['content_err'])){
                if(!empty($files['name'])){
                    move_uploaded_file($files['tmp_name'],'assets/uploads/'.$files['name']);
                }else{
                    $filename=$_POST['old_file'];
                }
            }else{
                $this->view("admin/post/create",$data);
            }
            $curId=getCurrentId();
            deleteCurrentId();
            if($this->postModel->updateData($curId,$_POST['cat_id'],$data['title'],$data['desc'],$filename,$data['content'])){
                flash("pes","Post edit success.");
                redirect(URLROOT.'post/show/'.$curId); 
            }else{
                flash("pef","Post edit fails.");
                redirect(URLROOT.'post/edit/'.$curId); 
            }
        }    
        else{
            setCurrentId($params[0]);
            $data['cats']=$this->catModel->getAllCategory();
            $data['post']=$this->postModel->getPostById($params[0]);
            $this->view('admin/post/edit',$data);
        }
    }    
    public function delete($params=[]){
        $data=[
            'cats'=>'',
            'posts'=>''
        ];
        if($this->postModel->deletePost($params[0])){
           redirect(URLROOT.'post/home/1');
        }else{
            flash("del_suc","Delete fails");
            $data['cats']=$this->catModel->getAllCategory();
            $data['posts']=$this->postModel->getPostByCatId($params[0]);
            $this->view("admin/post/home",$data);
        }
    }
}
<?php

class Category extends Controller{
    public function __construct(){
        $this->catModel=$this->model('CategoryModel');
    }
    public function create($data=[]){
        $data=[
            "name"=>"",
            "name_err"=>"",
            "cats"=>$this->catModel->getAllCategory()
        ];
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data['name']=$_POST['name'];

            if(empty($data['name'])){
                $data['name_err']="Category name must be supply";
                $this->view('admin/category/home',$data);
            }else{
               if($this->catModel->getCategoryByName($data['name'])){
                $data['name_err']="Category name is already in use";
                $this->view('admin/category/home',$data);      
               }else{
                    if($this->catModel->inertNewCategory($data['name'])){
                        flash("cat_create_success","Category Created Succesfully");
                        $data['cats']=$this->catModel->getAllCategory();
                        $this->view('admin/category/home',$data);
                    }else{
                        flash("cat_create_fail","Category Created Fail");
                        $this->view('admin/category/home',$data);
                    }
               }
            }
        }else{
            $this->view('admin/category/home',$data);
        }
    }
}
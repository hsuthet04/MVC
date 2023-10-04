<?php

class User extends Controller{
    public function __construct(){
        $this->userModel=$this->model('UserModel');
    }
    private $userModel;
    public function register(){
      if($_SERVER['REQUEST_METHOD']=="POST"){
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                "name"=>$_POST['name'],
                "email"=>$_POST['email'],
                "password"=>$_POST['password'],
                "confirm_password"=>$_POST['confirm_password'],
                "name_err"=>'',
                "email_err"=>'',
                "password_err"=>'',
                "confirm_password_err"=>''
            ];
            if(empty($data['name'])){
                $data['name_err']="User Name must be supply";
            }
            if(empty($data['email'])){
                $data['email_err']="Email must be supply";
            }else{
                if($this->userModel->getUserByEmail($data['email'])){
                    $data['email_err']="Email is already taken";
                }
            }
            if(empty($data['password'])){
                $data['password_err']="Password must be supply";
            }
            if(empty($data['confirm_password'])){
                $data['confirm_password_err']="Confirm password must be supply";
            }else{
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err']="Password do not match"; 
                }
            }
            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
               if($this->userModel->register($data['name'],$data['email'],$data['password'])){
                    flash('register_success',"Register success,Plz login");
                    $this->view("user/login");
               }
            }else{
                $this->view("user/register",$data);
            }
        }else{
            $this->view("user/register");
        }
    }
    public function login(){
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $_POST=filter_input_array(INPUT_POST);
            $data=[
                "email"=>$_POST['email'],
                "password"=>$_POST['password'],
                "email_err"=>'',
                "password_err"=>'', 
            ];
            
            if(empty($data['email'])){
                $data['email_err']="Email must be supply";
            }
            if(empty($data['password'])){
                $data['password_err']="Password must be supply";
            }
            if(empty($data['email_err']) && empty($data['password_err'])){
                $rowUser=$this->userModel->getUserByEmail($data['email']);
                //print_r($rowUser);
                if($rowUser){
                    // print_r($rowUser);
                        $hash_pass = $rowUser[0]->password;
                        if($data['password']){
                            setUserSession($rowUser);
                            //print_r($data['password']);
                            redirect(URLROOT.'admin/home');
                        }else{
                            flash("login_fail","User rror");
                            //print_r($data['password']);
                            $this->view('user/login');
                        }
                }else{
                $data['email_err']="Email error";
            }
            }else{
                $this->view("user/login",$data);
            }
        }else{
            $this->view("user/login");
        }
    }
    public function logout(){
        unsetUserSession();
        $this->view('home/index');
        
    }
}

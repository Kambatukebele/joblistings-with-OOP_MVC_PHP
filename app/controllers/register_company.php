<?php

  class Register_company extends Controller
  {
    public function index(){

      $data = []; 
      $data['page_title'] = "Register a Company"; 

      if($_SERVER['REQUEST_METHOD'] === "POST")
      {
        $companyModel = $this->model('company');
        $companyModel->store($_POST); 

        if(!$companyModel)
        {
          $data['errors'] = "We could not register your company"; 
          return $data; 
        }else{
          $data['success'] = "Your company has been successfully registered"; 
          header("Location: " . ROOT . "login");
          return $data;
        }
      }


      //You need to specify the folder of the view you want to load
      return $this->view("theme","register_company", $data);  
    }
  }
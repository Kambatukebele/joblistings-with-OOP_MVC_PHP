<?php

  class Register_company extends Controller
  {
    public function index(){

      $data = []; 
      $data['page_title'] = "Register a Company"; 

      if($_SERVER['REQUEST_METHOD'] === "POST")
      {
        $companyModel = $this->model('company');
        $result = $companyModel->register_company($_POST, $_FILES); 

        if(is_array($result) && count($result) > 0)
        {
          $data['error'] = $result;         
        }else{
           Redirect("login"); 
        }
      }

      //You need to specify the folder of the view you want to load
      return $this->view("theme","register_company", $data);  
    }
  }
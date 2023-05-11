<?php

  class Login_company extends Controller
  {
    public function index(){

      $data = []; 
      $data['page_title'] = "Login into your accout"; 

      if($_SERVER['REQUEST_METHOD'] === "POST")
      {
        $companyModel = $this->model('company');
        $result = $companyModel->login_company($_POST); 
        if(isset($result['password']) || isset($result['company_email']) || isset($result['EmailAndPassword']))
        {
          $data['error'] = $result;         
        }else{
          $_SESSION['company_details'] = $result;
          Redirect("company_account");
        }
      }

      //You need to specify the folder of the view you want to load
      return $this->view("theme","login_company", $data);  
    }
  }
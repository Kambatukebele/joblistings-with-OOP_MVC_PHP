<?php

  class Company_account extends Controller
  {
    public function index(){

      $data = []; 
      $data['page_title'] = "Company Account | Job Listings"; 

      $companyModel = $this->model('company');
      $result = $companyModel->show();      

      if(!$result){
        Redirect("home"); 
      }else{
         $data['result'] = $result;
      }
      //You need to specify the folder of the view you want to load
      return $this->view("theme","company_account", $data);  
    }

    public function company_edit (){
      $data = []; 
      $data['page_title'] = "Edit Account | Job Listings"; 

      $companyModel = $this->model('company');
      $result = $companyModel->show();
       
      if(!$result){
        Redirect("company_account");
      }else{
        $data['show'] = $result; 
        if($_SERVER['REQUEST_METHOD'] == "POST"){
          
          $edit = $companyModel->edit($_POST, $_FILES);
           
          if($edit != 1){
            $data['error'] = $edit; 
          }         
        }       
      }
     
      //You need to specify the folder of the view you want to load
      return $this->view("theme","company_edit", $data); 
    }

    public function company_delete_account ()
    {
      
      $companyModel = $this->model('company');
      $result = $companyModel->show();      

      if(!$result){
        Redirect("home"); 
      }else{
         $data['result'] = $result;
      }
      $data['page_title'] = "Delete Account | Job Listings"; 
      return $this->view("theme","company_delete_account", $data);
    }

    public function company_delete_account_destroy()
    {
      $companyModel = $this->model('company');
      $result = $companyModel->destroy();   
      
      Redirect("home"); 

    }

  }
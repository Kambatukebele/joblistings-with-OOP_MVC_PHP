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
      }    
      //You need to specify the folder of the view you want to load
      return $this->view("theme","company_edit", $data); 
    }
  }
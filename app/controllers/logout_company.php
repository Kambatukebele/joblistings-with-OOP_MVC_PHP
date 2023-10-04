<?php

  class Logout_company extends Controller 
  {
    public function index()
    {middleware($_SESSION['company_details']); 
      $companyModel = $this->model('company');
      $result = $companyModel->logout_company(); 
    }
  }
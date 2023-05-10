<?php

  class Logout_company extends Controller 
  {
    public function index()
    {
      $companyModel = $this->model('company');
      $result = $companyModel->logout_company(); 
    }
  }
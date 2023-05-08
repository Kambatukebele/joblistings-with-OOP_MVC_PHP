<?php

  class Company extends Database
  {
    public function store ($POST)
    {
      
     $companyName = htmlspecialchars(trim($POST['company_name']));
     $companyHQ = htmlspecialchars(trim($POST['company_HQ']));
     $logo = htmlspecialchars(trim($_POST['logo']));
     $companyWebsiteUrl = htmlspecialchars(trim($POST['company_website_url']));
     $password = htmlspecialchars(trim($POST['password']));
     $password_confirm = htmlspecialchars(trim($POST['password_confirm'])); 
     $companyEmail = htmlspecialchars(trim($POST['company_email']));
     $companyDescription = htmlspecialchars(trim($POST['company_description']));

     $error = array(); 

     if(empty($companyName)){
      $error['companyName'] = 'You must enter your company name';
     }else if(!preg_match("/^([a-zA-Z' ]+)$/", $companyName)){
      $error['companyName'] = 'Your company name must contains only letters';
     }

     if(empty($companyHQ)){
      $error['companyHQ'] = 'You must enter your companyHQ';
     }else if(!preg_match("/^([a-zA-Z' ]+)$/", $companyHQ)){
      $error['companyHQ'] = 'Your companyHQ must contains only letters';
     }

     if(empty($logo)){
      $error['logo'] = 'You must enter your logo';
     }

     if(empty($companyWebsiteUrl)){
           $error['companyWebsiteUrl'] = 'You must enter your company Website Url';
      }

      if(empty($password)){
        $error['password'] = 'You must enter your password';
      }elseif(strlen($password) < 6){
        $error['password'] = 'Your password must be atleast 6 characters long';
      }

      if($password !== $password_confirm){
        $error['passwordConfirm'] = 'Your passwords do not match';
      }

      if(empty($companyEmail)){
        $error['companyEmail'] = "You must enter your company URL"; 
      }elseif(!filter_var($companyEmail, FILTER_SANITIZE_EMAIL)){
        $error['companyEmail'] = "Invalide email address";
      }

      if(empty($companyDescription)){
        $error['companyDescription'] = "You must enter your company description"; 
      }

      if(empty($error)){

        $data = []; 
        $data['company_name'] = $companyName;
        $data['company_HQ'] = $companyHQ;
        $data['logo'] = $logo;
        $data['company_website_url'] = $companyWebsiteUrl;
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        $data['company_email'] = $companyEmail;
        $data['company_description'] = $companyDescription;


        $query = "INSERT INTO company (company_name, company_HQ, logo, company_website_url, company_email, password, company_description) VALUES (:company_name, :company_HQ, :logo, :company_website_url, :company_email, :password, :company_description)"; 

        $database = new Database(); 
 
        $stmt = $database->write($query, $data);

        if($stmt)
        {
          return $stmt;
        }

        return false;
 
      }
    
    }

    public function show ()
    {

    }

    public function update ()
    {

    }

    public function delete ()
    {

    }
  }
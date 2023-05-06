<?php

  class Listings extends Database
  {
    public function store ($POST)
    {
      $con = $this->db_connect(); 

     $jobTitle = htmlspecialchars(trim($POST['job_title']));
     $category = htmlspecialchars(trim($POST['category']));
     $tags = htmlspecialchars(trim($POST['tags']));  
     $worldWide = htmlspecialchars(trim($POST['worldwide']));
     $region = htmlspecialchars(trim($POST['region']));
     $timeZone = htmlspecialchars(trim($POST['time_zone']));
     $salaryRange = htmlspecialchars(trim($POST['salary_range']));
     $jobType = htmlspecialchars(trim($POST['job_type']));
     $applicationLinkEmail = htmlspecialchars(trim($POST['application_link_email']));
     $jonDescription = htmlspecialchars(trim($POST['job_description']));
     $companyName = htmlspecialchars(trim($POST['company_name']));
     $companyHQ = htmlspecialchars(trim($POST['company_hq']));
     $logo = htmlspecialchars(trim($_FILES['logo']));
     $companyWebsiteUrl = htmlspecialchars(trim($POST['company_website_url']));
     $companyEmail = htmlspecialchars(trim($POST['company_email']));
     $companyDescription = htmlspecialchars(trim($POST['company_description']));

     $error = array(); 

     if(empty($jobTitle)){
      $error['jobTitle'] = 'You must enter a job title';
     }else if(!preg_match("/^([a-zA-Z' ]+)$/", $jobTitle)){
      $error['jobTitle'] = 'Must contains only letters';
     }

     if(empty($category)){
      $error['category'] = 'You must enter a category';
     }else if(!preg_match("/^([a-zA-Z' ]+)$/", $category)){
      $error['category'] = 'Must contains only letters';
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
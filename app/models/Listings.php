<?php

class Listings extends Database
{
  public function register_post($POST)
  {
    $database = new Database();

    $jobTitle = htmlspecialchars(trim($POST['job_title']));
    $category = htmlspecialchars(trim($POST['category']));
    $tags = htmlspecialchars(trim($POST['tags']));
    $region = htmlspecialchars(trim($POST['region']));
    $salaryRange = htmlspecialchars(trim($POST['salary_range']));
    $jobType = htmlspecialchars(trim($POST['job_type']));
    $applicationLinkEmail = htmlspecialchars(trim($POST['application_link_email']));
    $jobDescription = htmlspecialchars(trim($POST['job_description']));

    $error = array();

    if (empty($jobTitle)) {
      $error['jobTitle'] = 'You must enter a job title';
    } else if (!preg_match("/^([a-zA-Z' ]+)$/", $jobTitle)) {
      $error['jobTitle'] = 'Must contains only letters';
    }

    if (empty($category)) {
      $error['category'] = 'You must enter a category';
    }

    if (empty($tags)) {
      $error['tags'] = 'You must enter tags, separated by commas';
    } else if (!preg_match("/^([a-zA-Z,' ]+)$/", $tags)) {
      $error['tags'] = 'Must contains only letters';
    }

    if (empty($region)) {
      $error['region'] = 'You must choose a region';
    }

    if (empty($salaryRange)) {
      $error['salaryRange'] = 'You must choose a salary range';
    }

    if (empty($jobType)) {
      $error['jobType'] = 'You must choose a job type';
    }

    if (empty($applicationLinkEmail)) {
      $error['applicationLinkEmail'] = 'You must enter an email address or link to an application';
    }

    if (empty($jobDescription)) {
      $error['jobDescription'] = 'You must enter a description';
    }

    if (empty($error)) {
      $data = [];
      $data['job_title'] = $jobTitle;
      $data['category'] = $category;
      $data['tags'] = $tags;
      $data['region'] = $region;
      $data['salary_range'] = $salaryRange;
      $data['job_type'] = $jobType;
      $data['application_link_email'] = $applicationLinkEmail;
      $data['job_description'] = $jobDescription;
      $data['company_id'] =  $_SESSION['company_details'][0]->id;

      $query = "INSERT INTO listings (job_title,category,tags,region,salary_range,job_type,application_link_email,job_description, company_id) VALUES (:job_title,:category,:tags,:region,:salary_range,:job_type,:application_link_email,:job_description, :company_id)";

      $stmt = $database->write($query, $data);

      if ($stmt) {
        return $stmt;
      } else {
        return $error;
      }
    } else {
      return $error;
    }
  }

  public function show()
  {
    $database = new Database();
    $data = [];
    // $data['id'] =  $_SESSION['company_details'][0]->id; 
    //$query = "SELECT * FROM listings WHERE id = :id ORDER BY id "; 
    $query = "SELECT * FROM listings ORDER BY id DESC";
    $stmt = $database->read($query);

    if ($stmt) {
      return $stmt;
    }
  }

  public function showSix()
  {
    $database = new Database();
    $data = [];
    // $data['id'] =  $_SESSION['company_details'][0]->id; 
    //$query = "SELECT * FROM listings WHERE id = :id ORDER BY id "; 
    $query = "SELECT * FROM company, listings WHERE company.id = listings.company_id ORDER BY listings.id DESC LIMIT 6";
    $stmt = $database->read($query);

    if ($stmt) {
      return $stmt;
    }
  }

  public function showManagePostUser()
  {
    $database = new Database();
    $data = [];
    $data['id'] =  $_SESSION['company_details'][0]->id;
    //$query = "SELECT * FROM listings WHERE id = :id ORDER BY id "; 
    $query = "SELECT * FROM listings WHERE company_id = :id ORDER BY id DESC";
    $stmt = $database->read($query, $data);

    if ($stmt) {
      return $stmt;
    }
  }

  public function showManageSinglePost()
  {
    $database = new Database();
    $data = [];
    $data['id'] =  $_SESSION['company_details'][0]->id;
    //$query = "SELECT * FROM listings WHERE id = :id ORDER BY id "; 
    $query = "SELECT * FROM listings WHERE company_id = :id ORDER BY id DESC";
    $stmt = $database->read($query, $data);

    if ($stmt) {
      return $stmt;
    }
  }

  public function SinglePost($id)
  {
    $database = new Database();
    $data = [];
    $data['id'] =  $id;
    //$query = "SELECT * FROM listings WHERE id = :id ORDER BY id "; 
    $query= "SELECT * FROM company, listings WHERE company.id = listings.company_id && listings.id = :id";
    $stmt = $database->read($query, $data);

    if ($stmt) {
      return $stmt;
    }
  }

  public function edit($id)
  {
    $database = new Database();
    $data = [];
    $data['listing_id'] =  $_SESSION['company_details'][0]->id;
    $data['id'] = $id;
    //$query = "SELECT * FROM listings WHERE id = :id ORDER BY id "; 
    $query = "SELECT * FROM listings WHERE company_id = :listing_id && id = :id ORDER BY id DESC";
    $stmt = $database->read($query, $data);

    if ($stmt) {
      return $stmt;
    }
  }

  public function update(array $POST, $id)
  {

    $database = new Database();

    $jobTitle = htmlspecialchars(trim($POST['job_title']));
    $category = htmlspecialchars(trim($POST['category']));
    $tags = htmlspecialchars(trim($POST['tags']));
    $region = htmlspecialchars(trim($POST['region']));
    $salaryRange = htmlspecialchars(trim($POST['salary_range']));
    $jobType = htmlspecialchars(trim($POST['job_type']));
    $applicationLinkEmail = htmlspecialchars(trim($POST['application_link_email']));
    $jobDescription = htmlspecialchars(trim($POST['job_description']));

    $error = array();

    if (empty($jobTitle)) {
      $error['jobTitle'] = 'You must enter a job title';
    } else if (!preg_match("/^([a-zA-Z' ]+)$/", $jobTitle)) {
      $error['jobTitle'] = 'Must contains only letters';
    }

    if (empty($category)) {
      $error['category'] = 'You must enter a category';
    }

    if (empty($tags)) {
      $error['tags'] = 'You must enter tags, separated by commas';
    } else if (!preg_match("/^([a-zA-Z,' ]+)$/", $tags)) {
      $error['tags'] = 'Must contains only letters';
    }

    if (empty($region)) {
      $error['region'] = 'You must choose a region';
    }

    if (empty($salaryRange)) {
      $error['salaryRange'] = 'You must choose a salary range';
    }

    if (empty($jobType)) {
      $error['jobType'] = 'You must choose a job type';
    }

    if (empty($applicationLinkEmail)) {
      $error['applicationLinkEmail'] = 'You must enter an email address or link to an application';
    }

    if (empty($jobDescription)) {
      $error['jobDescription'] = 'You must enter a description';
    }

    if (empty($error)) {
      $data = [];
      $data['id'] = $id;
      $data['job_title'] = $jobTitle;
      $data['category'] = $category;
      $data['tags'] = $tags;
      $data['region'] = $region;
      $data['salary_range'] = $salaryRange;
      $data['job_type'] = $jobType;
      $data['application_link_email'] = $applicationLinkEmail;
      $data['job_description'] = $jobDescription;
     

      $query = "UPDATE listings SET job_title = :job_title, category = :category, tags = :tags, region = :region, salary_range = :salary_range, job_type = :job_type, application_link_email = :application_link_email, job_description = :job_description WHERE id = :id";

      $stmt = $database->write($query, $data);

      if ($stmt) {
        return $stmt;
      } else {
        return $error;
      }
    } else {
      return $error;
    }
  }

  

  
}
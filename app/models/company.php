<?php

class Company extends Database
{
  public function register_company($POST, $FILEPIC)
  {
    $database = new Database();
    //VALIDATION
    $companyName = htmlspecialchars(trim($POST['company_name']));
    $companyHQ = htmlspecialchars(trim($POST['company_HQ']));
    // IMAGE DATA
    $logoName = htmlspecialchars(trim($FILEPIC['logo']['name']));
    $logoSize = htmlspecialchars(trim($FILEPIC['logo']['size']));
    $logoTMP = htmlspecialchars(trim($FILEPIC['logo']['tmp_name']));
    $logoType = htmlspecialchars(trim($FILEPIC['logo']['type']));
    // END IMAGE DATA
    $companyWebsiteUrl = htmlspecialchars(trim($POST['company_website_url']));
    $password = htmlspecialchars(trim($POST['password']));
    $password_confirm = htmlspecialchars(trim($POST['password_confirm']));
    $companyEmail = htmlspecialchars(trim($POST['company_email']));
    $companyDescription = htmlspecialchars(trim($POST['company_description']));

    $error = array();

    //Check if the Company name already exist
    $dataCompanyName['company_name'] = $companyName;
    $queryCompanyName = "SELECT company_name FROM company where company_name = :company_name";
    $stmCompanyName = $database->read($queryCompanyName, $dataCompanyName);
    if (empty($companyName)) {
      $error['companyName'] = 'You must enter your company name';
    } else if (!preg_match("/^([a-zA-Z' ]+)$/", $companyName)) {
      $error['companyName'] = 'Your company name must contains only letters';
    } elseif (!empty($stmCompanyName)) {
      if ($companyName == $stmCompanyName[0]->company_name) {
        $error['companyName'] = "Company name already taken!";
      }
    }
    //Check if the Company HQ already exist
    $dataCompanyHQ['company_HQ'] = $companyHQ;
    $queryCompanyHQ = "SELECT company_HQ FROM company where company_HQ = :company_HQ";
    $stmCompanyHQ = $database->read($queryCompanyHQ, $dataCompanyHQ);
    if (empty($companyHQ)) {
      $error['companyHQ'] = 'You must enter your companyHQ';
    } else if (!preg_match("/^([a-zA-Z' ]+)$/", $companyHQ)) {
      $error['companyHQ'] = 'Your companyHQ must contains only letters';
    } elseif (!empty($stmCompanyHQ)) {

      if ($companyHQ == $stmCompanyHQ[0]->company_HQ) {
        $error['companyHQ'] = "CompanyHQ already taken!";
      }
    }

    if (empty($logoName)) {
      $error['logo'] = 'You must enter your logo';
    } elseif ($logoSize > 2097152) {
      $error['logo'] = 'File size must be excately 2 MB';
    }

    $dataCompanyUrl['company_website_url'] = $companyWebsiteUrl;
    $queryCompanyUrl = "SELECT company_website_url FROM company WHERE company_website_url = :company_website_url";
    $stmcompany_website_url  = $database->read($queryCompanyUrl, $dataCompanyUrl);

    if (empty($companyWebsiteUrl)) {
      $error['companyWebsiteUrl'] = 'You must enter your company Website Url';
    } elseif (!empty($stmcompany_website_url)) {
      if ($companyWebsiteUrl == $stmcompany_website_url[0]->company_website_url) {
        $error['companyWebsiteUrl'] = 'This url already exist';
      }
    }

    if (empty($password)) {
      $error['password'] = 'You must enter your password';
    } elseif (strlen($password) < 6) {
      $error['password'] = 'Your password must be atleast 6 characters long';
    }

    if ($password !== $password_confirm) {
      $error['passwordConfirm'] = 'Your passwords do not match';
    }

    //Check if email is already taken
    $dataCompanyEmail['company_email'] = $companyEmail;
    $queryCompanyEmail = "SELECT company_email FROM company WHERE company_email = :company_email";
    $stmtCompanyEmail = $database->read($queryCompanyEmail, $dataCompanyEmail);

    if (empty($companyEmail)) {
      $error['companyEmail'] = "You must enter your company Email";
    } elseif (!filter_var($companyEmail, FILTER_VALIDATE_EMAIL)) {
      $error['companyEmail'] = "Invalide email address";
    } elseif (!empty($stmtCompanyEmailt)) {
      if ($companyEmail === $stmtCompanyEmail[0]->company_email) {
        $error['companyEmail'] = "This email already exists";
      }
    }

    if (empty($companyDescription)) {
      $error['companyDescription'] = "You must enter your company description";
    }

    if (empty($error)) {
      $uploadFile = "assets/images/";
      move_uploaded_file($logoTMP, $uploadFile . $logoName);

      $data = [];
      $data['company_name'] = $companyName;
      $data['company_HQ'] = $companyHQ;
      $data['logo'] = $logoName;
      $data['company_website_url'] = $companyWebsiteUrl;
      $data['password'] = password_hash($password, PASSWORD_DEFAULT);
      $data['company_email'] = $companyEmail;
      $data['company_description'] = $companyDescription;

      $query = "INSERT INTO company (company_name, company_HQ, logo, company_website_url, company_email, password, company_description) VALUES (:company_name, :company_HQ, :logo, :company_website_url, :company_email, :password, :company_description)";

      $stmt = $database->write($query, $data);

      if ($stmt) {
        return $stmt;
      }
    } else {
      return $error;
    }
  }

  //LOGGING A COMPANY
  public function login_company($POST)
  {
    $database = new Database();

    //validation
    $password = htmlspecialchars(trim($POST['password']));
    $companyEmail = htmlspecialchars(trim($POST['company_email']));

    $error = [];

    //Email
    if (empty($companyEmail)) {
      $error['companyEmail'] = "You must enter your company Email";
    } elseif (!filter_var($companyEmail, FILTER_VALIDATE_EMAIL)) {
      $error['companyEmail'] = "Invalide email address";
    }

    //password
    if (empty($password)) {
      $error['password'] = 'You must enter your password';
    }

    if (empty($error)) {
      $data = [];
      $data['company_email'] = $companyEmail;

      $query = "SELECT * FROM company WHERE company_email = :company_email LIMIT 1";
      $stmt = $database->read($query, $data);

      if ($stmt) {
        $passwordCheck = password_verify($password, $stmt[0]->password);
        if ($passwordCheck) {
          //Connection success
          return $stmt;
        } else {
          $error['EmailAndPassword'] = "Wrong Email or Password";
          return $error;
        }
      } else {
        $error['EmailAndPassword'] = "Wrong Email or Password";
        return $error;
      }
    } else {
      return $error;
    }
  }

  public function logout_company()
  {
    if (isset($_SESSION['company_details']) && !empty($_SESSION['company_details'])) {
      session_destroy();
      Redirect("home");
    }
  }


  //CRUD ON COMPANY details
  public function show()
  {
    $database = new Database();

    $data = [];
    $data['id'] = $_SESSION['company_details'][0]->id;
    $query = "SELECT * FROM company WHERE id = :id LIMIT 1";
    $stmt = $database->read($query, $data);

    return $stmt;
  }

  public function edit($POST, $FILEPIC)
  {
    $database = new Database();

    //VALIDATION
    $companyName = htmlspecialchars(trim($POST['company_name']));
    $companyHQ = htmlspecialchars(trim($POST['company_HQ']));
    $logoName = htmlspecialchars(trim($FILEPIC['logo']['name']));
    $logoSize = htmlspecialchars(trim($FILEPIC['logo']['size']));
    $logoTMP = htmlspecialchars(trim($FILEPIC['logo']['tmp_name']));
    $logoType = htmlspecialchars(trim($FILEPIC['logo']['type']));
    $companyWebsiteUrl = htmlspecialchars(trim($POST['company_website_url']));
    $password = htmlspecialchars(trim($POST['password']));
    $password_confirm = htmlspecialchars(trim($POST['password_confirm']));
    $companyEmail = htmlspecialchars(trim($POST['company_email']));
    $companyDescription = htmlspecialchars(trim($POST['company_description']));

    $error = array();


    if (empty($companyName)) {
      $error['companyName'] = 'You must enter your company name';
    } else if (!preg_match("/^([a-zA-Z' ]+)$/", $companyName)) {
      $error['companyName'] = 'Your company name must contains only letters';
    }
    //Check if the Company HQ already exist
    if (empty($companyHQ)) {
      $error['companyHQ'] = 'You must enter your companyHQ';
    } else if (!preg_match("/^([a-zA-Z' ]+)$/", $companyHQ)) {
      $error['companyHQ'] = 'Your companyHQ must contains only letters';
    }



    if (empty($companyWebsiteUrl)) {
      $error['companyWebsiteUrl'] = 'You must enter your company Website Url';
    }

    // if (empty($password)) {
    //   $error['password'] = 'You must enter your password';
    // } elseif (strlen($password) < 6) {
    //   $error['password'] = 'Your password must be atleast 6 characters long';
    // }

    // if ($password !== $password_confirm) {
    //   $error['passwordConfirm'] = 'Your passwords do not match';
    // }


    if (empty($companyEmail)) {
      $error['companyEmail'] = "You must enter your company Email";
    } elseif (!filter_var($companyEmail, FILTER_VALIDATE_EMAIL)) {
      $error['companyEmail'] = "Invalide email address";
    }

    if (empty($companyDescription)) {
      $error['companyDescription'] = "You must enter your company description";
    }

    if (empty($error)) {
      // first scnenario User Update without logo and password
      if (isset($companyName) && isset($companyHQ) && isset($companyWebsiteUrl) && isset($companyEmail) && isset($companyDescription)) {
        $data = [];
        $data['id'] = $_SESSION['company_details'][0]->id;
        $data['company_name'] = $companyName;
        $data['company_HQ'] = $companyHQ;
        $data['company_website_url'] = $companyWebsiteUrl;
        $data['company_email'] = $companyEmail;
        $data['company_description'] = $companyDescription;

        $query = "UPDATE company SET company_name = :company_name, company_HQ = :company_HQ, company_website_url = :company_website_url, company_email = :company_email, company_description = :company_description WHERE id = :id";

        $stmt = $database->write($query, $data);

        if ($stmt) {
          Redirect("company_account/company_edit");
          return $stmt;
        } else {
          return $error;
        }
      }

      // second scenario is : the user update the logo  and everything else except the password
       //validation logo
      if (empty($logoName)) {
        $error['logo'] = 'You must enter your logo';
      } elseif ($logoSize > 2097152) {
        $error['logo'] = 'File size must be excately 2 MB';
      }
      if(empty($error['logo'])){

        if (isset($logo)) {         
          # code...
          $uploadFile = "assets/images/";
          move_uploaded_file($logoTMP, $uploadFile . $logoName);
  
          $data = [];
          $data['id'] = $_SESSION['company_details'][0]->id;
          $data['company_name'] = $companyName;
          $data['company_HQ'] = $companyHQ;
          $data['logo'] = $logoName;
          $data['company_website_url'] = $companyWebsiteUrl;
          $data['company_email'] = $companyEmail;
          $data['company_description'] = $companyDescription;
  
          $query = "UPDATE company SET company_name = :company_name, company_HQ = :company_HQ, logo = :logo, company_website_url = :company_website_url, company_email = :company_email, company_description = :company_description WHERE id = :id";
  
          $stmt = $database->write($query, $data);
  
          if ($stmt) {
            //  Redirect("company_account/company_edit");
            return $stmt;
          }
        }else{
          return $error; 
        }
      }else{
        return $error; 
      }
    } else {
      return $error;
    }
  }

  public function delete()
  {
  }
}
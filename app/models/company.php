<?php

class Company extends Database
{
  public $companyName = "";
  public $companyHQ = "";
  public $logoName = "";
  public $logoSize = "";
  public $logoTMP = "";
  public $logoType =   "";
  public $companyWebsiteUrl = "";
  public $password = "";
  public $password_confirm = "";
  public $companyEmail = "";
  public $companyDescription = "";

  public function secureInputs($input)
  {
    return  htmlspecialchars(trim($input));
  }
  public function register_company($POST, $FILEPIC)
  {
    $database = new Database();
    //VALIDATION
    $this->companyName = $this->secureInputs($POST['company_name']);
    $this->companyHQ = $this->secureInputs($POST['company_HQ']);
    // IMAGE DATA
    $this->logoName = $this->secureInputs($FILEPIC['logo']['name']);
    $this->logoSize = $this->secureInputs($FILEPIC['logo']['size']);
    $this->logoTMP = $this->secureInputs($FILEPIC['logo']['tmp_name']);
    $this->logoType = $this->secureInputs($FILEPIC['logo']['type']);
    // END IMAGE DATA
    $this->companyWebsiteUrl = $this->secureInputs($POST['company_website_url']);
    $this->password = $this->secureInputs($POST['password']);
    $this->password_confirm = $this->secureInputs($POST['password_confirm']);
    $this->companyEmail = $this->secureInputs($POST['company_email']);
    $this->companyDescription = $this->secureInputs($POST['company_description']);

    $error = array();

    //Check if the Company name already exist
    $dataCompanyName['company_name'] = $this->companyName;
    $queryCompanyName = "SELECT company_name FROM company where company_name = :company_name";
    $stmCompanyName = $database->read($queryCompanyName, $dataCompanyName);
    if (empty($this->companyName)) {
      $error['companyName'] = 'You must enter your company name';
    } else if (!preg_match("/^([a-zA-Z' ]+)$/", $this->companyName)) {
      $error['companyName'] = 'Your company name must contains only letters';
    } elseif (!empty($stmCompanyName)) {
      if ($this->companyName == $stmCompanyName[0]->company_name) {
        $error['companyName'] = "Company name already taken!";
      }
    }
    //Check if the Company HQ already exist
    $dataCompanyHQ['company_HQ'] = $this->companyHQ;
    $queryCompanyHQ = "SELECT company_HQ FROM company where company_HQ = :company_HQ";
    $stmCompanyHQ = $database->read($queryCompanyHQ, $dataCompanyHQ);
    if (empty($this->companyHQ)) {
      $error['companyHQ'] = 'You must enter your companyHQ';
    } else if (!preg_match("/^([a-zA-Z' ]+)$/", $this->companyHQ)) {
      $error['companyHQ'] = 'Your companyHQ must contains only letters';
    } elseif (!empty($stmCompanyHQ)) {

      if ($this->companyHQ == $stmCompanyHQ[0]->company_HQ) {
        $error['companyHQ'] = "CompanyHQ already taken!";
      }
    }

    if (empty($this->logoName)) {
      $error['logo'] = 'You must enter your logo';
    } elseif ($this->logoSize > 2097152) {
      $error['logo'] = 'File size must be excately 2 MB';
    }

    $dataCompanyUrl['company_website_url'] = $this->companyWebsiteUrl;
    $queryCompanyUrl = "SELECT company_website_url FROM company WHERE company_website_url = :company_website_url";
    $stmcompany_website_url  = $database->read($queryCompanyUrl, $dataCompanyUrl);

    if (empty($this->companyWebsiteUrl)) {
      $error['companyWebsiteUrl'] = 'You must enter your company Website Url';
    } elseif (!empty($stmcompany_website_url)) {
      if ($this->companyWebsiteUrl == $stmcompany_website_url[0]->company_website_url) {
        $error['companyWebsiteUrl'] = 'This url already exist';
      }
    }

    if (empty($this->password)) {
      $error['password'] = 'You must enter your password';
    } elseif (strlen($this->password) < 6) {
      $error['password'] = 'Your password must be atleast 6 characters long';
    }

    if ($this->password !== $this->password_confirm) {
      $error['passwordConfirm'] = 'Your passwords do not match';
    }

    //Check if email is already taken
    $dataCompanyEmail['company_email'] = $this->companyEmail;
    $queryCompanyEmail = "SELECT company_email FROM company WHERE company_email = :company_email";
    $stmtCompanyEmail = $database->read($queryCompanyEmail, $dataCompanyEmail);

    if (empty($this->companyEmail)) {
      $error['companyEmail'] = "You must enter your company Email";
    } elseif (!filter_var($this->companyEmail, FILTER_VALIDATE_EMAIL)) {
      $error['companyEmail'] = "Invalide email address";
    } elseif (!empty($stmtCompanyEmailt)) {
      if ($this->companyEmail === $stmtCompanyEmail[0]->company_email) {
        $error['companyEmail'] = "This email already exists";
      }
    }

    if (empty($this->companyDescription)) {
      $error['companyDescription'] = "You must enter your company description";
    }

    if (empty($error)) {
      $uploadFile = "assets/images/";
      move_uploaded_file($this->logoTMP, $uploadFile . $this->logoName);

      $data = [];
      $data['company_name'] = $this->companyName;
      $data['company_HQ'] = $this->companyHQ;
      $data['logo'] = $this->logoName;
      $data['company_website_url'] = $this->companyWebsiteUrl;
      $data['password'] = password_hash($this->password, PASSWORD_DEFAULT);
      $data['company_email'] = $this->companyEmail;
      $data['company_description'] = $this->companyDescription;

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
    $this->password = $this->secureInputs($POST['password']);
    $this->companyEmail = $this->secureInputs($POST['company_email']);

    $error = [];

    //Email
    if (empty($this->companyEmail)) {
      $error['companyEmail'] = "You must enter your company Email";
    } elseif (!filter_var($this->companyEmail, FILTER_VALIDATE_EMAIL)) {
      $error['companyEmail'] = "Invalide email address";
    }

    //password
    if (empty($this->password)) {
      $error['password'] = 'You must enter your password';
    }

    if (empty($error)) {
      $data = [];
      $data['company_email'] = $this->companyEmail;

      $query = "SELECT * FROM company WHERE company_email = :company_email LIMIT 1";
      $stmt = $database->read($query, $data);

      if ($stmt) {
        $passwordCheck = password_verify($this->password, $stmt[0]->password);
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

   if (isset($POST['company_name']) && isset($POST['company_HQ']) && isset($POST['company_website_url']) && isset($POST['company_email']) && isset($POST['company_description'])) 
    {
      $this->AllInputsExceptLogoAndPassword(
        $this->companyName = $this->secureInputs($POST['company_name']), 
        $this->companyHQ = $this->secureInputs($POST['company_HQ']),
        $this->companyWebsiteUrl = $this->secureInputs($POST['company_website_url']),
        $this->companyEmail = $this->secureInputs($POST['company_email']),
        $this->companyDescription = $this->secureInputs($POST['company_description'])
      ); 

    }elseif(isset($POST['company_name']) && isset($POST['company_HQ']) && isset($_FILES['logo']) && isset($POST['company_website_url']) && isset($POST['company_email']) && isset($POST['company_description']))
    {
      $this->AllInputsExceptPassword(
        $this->companyName = $this->secureInputs($POST['company_name']), 
        $this->companyHQ = $this->secureInputs($POST['company_HQ']),
        $this->logoName = $this->secureInputs($FILEPIC['logo']),
        $this->companyWebsiteUrl = $this->secureInputs($POST['company_website_url']),
        $this->companyEmail = $this->secureInputs($POST['company_email']),
        $this->companyDescription = $this->secureInputs($POST['company_description'])
      );

    }




    
  }


  /*****************************************************************
   * we will create function scenario cases for editing our user profile company
   ********************************************************************/
  public function AllInputsExceptLogoAndPassword($companyName, $companyHQ, $companyWebsiteUrl, $companyEmail, $companyDescription)
  {
    $database = new Database();

    $error = array();

    if (empty($this->companyName)) {
      $error['companyName'] = 'You must enter your company name';
    } else if (!preg_match("/^([a-zA-Z' ]+)$/", $this->companyName)) {
      $error['companyName'] = 'Your company name must contains only letters';
    }
    //Check if the Company HQ already exist
    if (empty($this->companyHQ)) {
      $error['companyHQ'] = 'You must enter your companyHQ';
    } else if (!preg_match("/^([a-zA-Z' ]+)$/", $this->companyHQ)) {
      $error['companyHQ'] = 'Your companyHQ must contains only letters';
    }

    if (empty($this->companyWebsiteUrl)) {
      $error['companyWebsiteUrl'] = 'You must enter your company Website Url';
    }

    if (empty($this->companyEmail)) {
      $error['companyEmail'] = "You must enter your company Email";
    } elseif (!filter_var($this->companyEmail, FILTER_VALIDATE_EMAIL)) {
      $error['companyEmail'] = "Invalide email address";
    }

    if (empty($this->companyDescription)) {
      $error['companyDescription'] = "You must enter your company description";
    }

    if (empty($error)) {
      // first scnenario User Update without logo and password
      
      $data = [];
      $data['id'] = $_SESSION['company_details'][0]->id;
      $data['company_name'] = $this->companyName;
      $data['company_HQ'] = $this->companyHQ;
      $data['company_website_url'] = $this->companyWebsiteUrl;
      $data['company_email'] = $this->companyEmail;
      $data['company_description'] = $this->companyDescription;

      $query = "UPDATE company SET company_name = :company_name, company_HQ = :company_HQ, company_website_url = :company_website_url, company_email = :company_email, company_description = :company_description WHERE id = :id";

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

  public function AllInputsExceptPassword($companyName, $companyHQ, $logoName, $companyWebsiteUrl, $companyEmail, $companyDescription)
  {
     $database = new Database();

    $error = array();

    if (empty($this->companyName)) {
      $error['companyName'] = 'You must enter your company name';
    } else if (!preg_match("/^([a-zA-Z' ]+)$/", $this->companyName)) {
      $error['companyName'] = 'Your company name must contains only letters';
    }
    //Check if the Company HQ already exist
    if (empty($this->companyHQ)) {
      $error['companyHQ'] = 'You must enter your companyHQ';
    } else if (!preg_match("/^([a-zA-Z' ]+)$/", $this->companyHQ)) {
      $error['companyHQ'] = 'Your companyHQ must contains only letters';
    }

    if (empty($this->logoName)) {
      $error['logo'] = 'You must enter your logo';
    } elseif ($this->logoSize > 2097152) {
      $error['logo'] = 'File size must be excately 2 MB';
    }

    if (empty($this->companyWebsiteUrl)) {
      $error['companyWebsiteUrl'] = 'You must enter your company Website Url';
    }

    if (empty($this->companyEmail)) {
      $error['companyEmail'] = "You must enter your company Email";
    } elseif (!filter_var($this->companyEmail, FILTER_VALIDATE_EMAIL)) {
      $error['companyEmail'] = "Invalide email address";
    }

    if (empty($this->companyDescription)) {
      $error['companyDescription'] = "You must enter your company description";
    }

    if (empty($error)) {
     
       $uploadFile = "assets/images/";
      move_uploaded_file($this->logoTMP, $uploadFile . $this->logoName);
      
      $data = [];
      $data['id'] = $_SESSION['company_details'][0]->id;
      $data['company_name'] = $this->companyName;
      $data['company_HQ'] = $this->companyHQ;
      $data['logo'] = $this->logoName;
      $data['company_website_url'] = $this->companyWebsiteUrl;
      $data['company_email'] = $this->companyEmail;
      $data['company_description'] = $this->companyDescription;


      $query = "UPDATE company SET company_name = :company_name, company_HQ = :company_HQ, logo = :logo company_website_url = :company_website_url, company_email = :company_email, company_description = :company_description WHERE id = :id";

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
  /*****************************************************************
   * we will function scenario cases for editing our user profile company
   ********************************************************************/

  public function delete()
  {
  }
}
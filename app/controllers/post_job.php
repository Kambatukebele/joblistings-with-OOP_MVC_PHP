<?php

  class Post_job extends Controller
  {
    public function index(){
      middleware($_SESSION['company_details']); 
      $data['page_title'] = "Post an Offer | Job Listings"; 

      if($_SERVER['REQUEST_METHOD'] === "POST"){
       
        $listingsModel = $this->model("Listings");
        $result = $listingsModel->register_post($_POST); 

        if(is_array($result)){
          $data['error'] = $result; 
        }else{
          Redirect("manager_posts");
        }       
      }
      //You need to specify the folder of the view you want to load
      return $this->view("theme","post_job", $data);  
    }
  }
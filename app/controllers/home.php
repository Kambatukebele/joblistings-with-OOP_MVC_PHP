<?php

  class Home extends Controller
  {
    public function index(){
      $listingModel = $this->model('Listings');
      $result = $listingModel->show(); 

      if(is_array($result) && count($result) > 0){
        $data['success'] = $result; 
      }
      $data['page_title'] = "Home | Job Listings"; 
      //You need to specify the folder of the view you want to load
      return $this->view("theme","home", $data);  
    }
  }
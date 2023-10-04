<?php

  class About extends Controller
  {
    public function index(){
      $data['page_title'] = "About | Job Listings";
      //You need to specify the folder of the view you want to load
      return $this->view("theme","about", $data);  
    }
  }
<?php

  class Blog extends Controller
  {
    public function index(){
      $data['page_title'] = "BLog | Job Listings";
      //You need to specify the folder of the view you want to load
      return $this->view("theme","blog", $data);  
    }
  }